<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\FailedExport;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function downloadInvalidRows()
    {
        // Créez un fichier Excel des lignes rejetées
        $invalidRows = session('import_errors_data', null);
        session()->forget('import_errors_data');
        if (!is_null($invalidRows)) {
            $invalidRowsExport = new FailedExport($invalidRows);
            return Excel::download($invalidRowsExport, 'invalid_rows.xlsx')->deleteFileAfterSend(true);
        }
        return redirect()->route('rdv-a-r-vs.index')->withErrors(["message" => "Aucune ligne rejetée trouvée !"]);
    }
}
