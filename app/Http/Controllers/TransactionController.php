<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        if (Auth::user()->role->name == 'penguji') { //untuk uji coba
            $transactions = Transaction::with('kamar')
            ->with('penyewa')
            ->where('jenis', 'pemasukan')
            ->where('status_bayar', 'belum bayar')
            ->whereIn('status_order', ['pending', 'terima'])
            ->paginate(10);
        } else {
            $transactions = Transaction::with('kamar')
            ->with('penyewa')
            ->where('jenis', 'pemasukan')
            ->where('penyewa_id', Auth::id())
            ->where('status_bayar', 'belum bayar')
            ->whereIn('status_order', ['pending', 'terima'])
            ->paginate(10);
        }

        return view('transaction.index', compact('transactions'));
    }

    public function process()
    {
        $transactions = Transaction::with('kamar')
        ->with('penyewa')
        ->where('jenis', 'pemasukan')
        ->where('status_bayar', 'belum bayar')
        ->whereIn('status_order', ['pending', 'terima'])
        ->get();

        return view('transaction.indexprocess', compact('transactions'));
    }

    public function indexhistory(Request $request)
    {
        // Mendapatkan input filter dari request
        $search = $request->input('search');     // Filter nama penyewa
        $roomId = $request->input('room');       // Filter berdasarkan kamar
        $tanggal1 = $request->input('tanggal1'); // Filter tanggal mulai
        $tanggal2 = $request->input('tanggal2'); // Filter tanggal akhir

        //khusus penyewa
        if (Auth::user()->role->name == 'penyewa') {
            $query = Transaction::with('kamar', 'penyewa')
            ->where('jenis', 'pemasukan')
            ->where('penyewa_id', Auth::id())
            ->where(function($query) {
                $query->where(function($query) {
                            $query->where('status_bayar', 'belum bayar')
                                ->where('status_order', 'tolak');
                        })
                    ->orWhere(function($query) {
                            $query->where('status_bayar', 'bayar')
                                ->where('status_order', 'terima');
                        });
            });
        } else {
             // Query dasar untuk mengambil transaksi yang sudah memenuhi syarat
            $query = Transaction::with('kamar', 'penyewa')
            ->where('jenis', 'pemasukan')
            ->where(function($query) {
                $query->where(function($query) {
                            $query->where('status_bayar', 'belum bayar')
                                ->where('status_order', 'tolak');
                        })
                    ->orWhere(function($query) {
                            $query->where('status_bayar', 'bayar')
                                ->where('status_order', 'terima');
                        });
            });
        }

        // Jika ada input pencarian nama penyewa, tambahkan ke query
        if ($search) {
            $query->whereHas('penyewa', function($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            });
        }

        // Jika ada filter kamar, tambahkan ke query
        if ($roomId) {
            $query->where('kamar_id', $roomId);
        }

        // Jika ada filter tanggal, tambahkan ke query
        if ($tanggal1 && $tanggal2) {
            $query->whereBetween('tanggal', [$tanggal1, $tanggal2]);
        } elseif ($tanggal1) {
            $query->where('tanggal', '>=', $tanggal1);
        } elseif ($tanggal2) {
            $query->where('tanggal', '<=', $tanggal2);
        }

        // Mengambil data transaksi dengan paginasi setelah semua filter diterapkan
        $transactions = $query->paginate(20);

        // Mengambil semua data rooms untuk dropdown
        $rooms = Room::all();

        // Mengirim data ke view
        return view('transaction.indexhistory', compact('transactions', 'rooms', 'search', 'roomId', 'tanggal1', 'tanggal2'));
    }

    public function indexexpense(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // Query dasar untuk transaksi pengeluaran
        $query = Transaction::where('jenis', 'pengeluaran');

        // Tambahkan filter bulan jika dipilih
        if ($bulan) {
            $query->whereMonth('tanggal', $bulan);
        }

        // Tambahkan filter tahun jika dipilih
        if ($tahun) {
            $query->whereYear('tanggal', $tahun);
        }

        $transactions = $query->paginate(15);

        return view('transaction.indexexpense', compact('transactions', 'bulan', 'tahun'));
    }

    public function createexpense()
    {
        return view('transaction.createexpense');
    }

    public function storeexpense(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string|min:4',
            'bukti' => 'required|image|mimes:jpeg,png,jpg,jfif|max:2048',
            'total_bayar' => 'required|integer',
            'tanggal' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // ubah nama file gambar dengan angka random
        $buktiName = time().'.'.$request->bukti->extension();

        // upload file gambar ke folder room
        Storage::putFileAs('public/transaction', $request->file('bukti'), $buktiName);

        $transaction = Transaction::create([
            'nama' => $request->nama,
            'jenis' => 'pengeluaran',
            'status_bayar' => 'bayar',
            'status_order' => 'terima',
            'bukti' => $buktiName,
            'total_bayar' => $request->total_bayar,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('expense.index')->with('success', 'expense created successfully!');
    }

    public function destroyexpense($id)
    {
        $transaction = transaction::find($id);

        Storage::delete('public/transaction/'.$transaction->bukti);

        $transaction->delete();

        return redirect()->route('expense.index');
    }

    public function create($id)
    {
        $room = Room::findOrFail($id);

        // Mengirim data room ke view
        return view('transaction.create', compact('room'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string|min:4',
            'no_ktp' => 'required|string|min:16',
            'no_hp' => 'required|string|min:11',
            'no_wali' => 'required|string|min:11',
            'birth' => 'required',
            'alamat' => 'required|string|min:4',
            'ktp' => 'required|image|mimes:jpeg,png,jpg,jfif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // ubah nama file gambar dengan angka random
        $ktpName = time().'.'.$request->ktp->extension();

        // upload file gambar ke folder slider
        Storage::putFileAs('public/user', $request->file('ktp'), $ktpName);

        // insert data ke table sliders
        $transaction = Transaction::create([
            'jenis' => 'pemasukan',
            'status_bayar' => 'belum bayar',
            'kamar_id' => $request->kamar_id,
            'status_order' => 'pending',
            'total_bayar' => $request->total_bayar,
            'penyewa_id' => $request->penyewa_id,
            'tanggal' => Carbon::now()->toDateString(),
        ]);

        //update table room
        Room::where('id', $request->kamar_id)->update([
            'status_ketersediaan' => 'tidak ada',
        ]);

        //update table user
        User::where('id', $request->penyewa_id)->update([
            'nama' => $request->nama,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp,
            'no_wali' => $request->no_wali,
            'birth' => $request->birth,
            'alamat' => $request->alamat,
            'kamar_id' => $request->kamar_id,
            'ktp' => $ktpName,
        ]);

        // alihkan halaman ke halaman transaction.index
        return redirect()->route('transaction.index');
    }

    public function accepted($id)
    {
        Transaction::where('id', $id)->update([
            'status_order' => 'terima',
            'metode_pembayaran' => 'BRI 085263123023 A.N Minur',
        ]);

        return redirect()->route('process.index');
    }

    public function rejected($id)
    {
        $transaction = Transaction::findOrFail($id);

        $kamar_id = $transaction->kamar_id;
        $penyewa_id = $transaction->penyewa_id;

        DB::transaction(function () use ($id, $kamar_id, $penyewa_id) {
            // Update status order transaksi
            Transaction::where('id', $id)->update([
                'status_order' => 'tolak',
            ]);

            // Update table User
            User::where('id', $penyewa_id)->update([
                'kamar_id' => null,
            ]);

            // Update table Room
            Room::where('id', $kamar_id)->update([
                'status_ketersediaan' => 'ada',
            ]);
        });

        return redirect()->route('process.index');
    }

    public function edit($id)
    {
        // cari data berdasarkan id menggunakan find()
        $transaction = Transaction::find($id);
        $room = Room::find($transaction->kamar_id);
        $user = User::find($transaction->penyewa_id);

        return view('transaction.edit', compact('transaction', 'room', 'user'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'bukti' => 'required|image|mimes:jpeg,png,jpg,jfif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // ubah nama file gambar dengan angka random
        $buktiName = time().'.'.$request->bukti->extension();

        // upload file gambar ke folder slider
        Storage::putFileAs('public/transaction', $request->file('bukti'), $buktiName);

        Transaction::where('id', $id)->update([
            'bukti' => $buktiName,
        ]);


        return redirect()->route('transaction.index');
    }

    public function accepted_bukti($id)
    {
        Transaction::where('id', $id)->update([
            'status_bayar' => 'bayar',
        ]);

        return redirect()->route('process.index');
    }

    public function rejected_bukti($id)
    {
        Transaction::where('id', $id)->update([
            'bukti' => null,
        ]);

        // ambil nama file gambar lama dari database
        $gambar_lama = Transaction::find($id)->bukti;

        //hapus file gambar lama
        Storage::delete('public/transaction/'.$gambar_lama);

        return redirect()->route('process.index');
    }

    //fungsi detil/show
    public function detail($id)
    {
        // cari data berdasarkan id menggunakan find()
        $transaction = Transaction::find($id);
        $room = Room::find($transaction->kamar_id);
        $user = User::find($transaction->penyewa_id);

        return view('transaction.detil', compact('transaction', 'room', 'user'));
    }

    public function indexreport(Request $request)
    {
        // Ambil nilai bulan dan tahun dari request
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // Query untuk laporan keuangan
        $query = DB::table('transactions')
            ->select(
                DB::raw("DATE_FORMAT(tanggal, '%m-%Y') as bulan_tahun"),
                DB::raw("SUM(CASE WHEN jenis = 'pemasukan' THEN total_bayar ELSE 0 END) as total_pemasukan"),
                DB::raw("SUM(CASE WHEN jenis = 'pengeluaran' THEN total_bayar ELSE 0 END) as total_pengeluaran")
            );

        // Tambahkan filter bulan dan tahun jika ada
        if ($bulan) {
            $query->where(DB::raw("MONTH(tanggal)"), $bulan);
        }

        if ($tahun) {
            $query->where(DB::raw("YEAR(tanggal)"), $tahun);
        }

        // Lanjutkan grouping dan eksekusi query
        $laporanKeuangan = $query->groupBy(DB::raw("DATE_FORMAT(tanggal, '%m-%Y')"))
            ->get()
            ->map(function ($row) {
                $row->total = $row->total_pemasukan - $row->total_pengeluaran;
                return $row;
            });

        // Return ke view dengan variabel bulan dan tahun untuk retain data filter pada select option
        return view('transaction.indexreport', compact('laporanKeuangan', 'bulan', 'tahun'));
    }

    public function reportdetail($bulan_tahun)
    {
        // Format bulan_tahun dari URL ke dalam bentuk date yang bisa digunakan pada query
        [$bulan, $tahun] = explode('-', $bulan_tahun);

        // Ambil data transaksi sesuai bulan dan tahun
        $transaksiDetail = DB::table('transactions')
            ->whereYear('tanggal', $tahun)
            ->whereMonth('tanggal', $bulan)
            ->get()
            ->map(function ($transaksi) {
                $transaksi->keterangan = $transaksi->jenis == 'pengeluaran'
                    ? $transaksi->nama
                    : "Pembayaran kos kamar {$transaksi->kamar_id}";
                $transaksi->saldo = $transaksi->jenis == 'pengeluaran' ? -$transaksi->total_bayar : $transaksi->total_bayar;
                return $transaksi;
            });

        // Hitung total saldo
        $totalSaldo = $transaksiDetail->sum('saldo');

        return view('transaction.indexreportdetil', compact('transaksiDetail', 'bulan_tahun', 'totalSaldo'));
    }
}
