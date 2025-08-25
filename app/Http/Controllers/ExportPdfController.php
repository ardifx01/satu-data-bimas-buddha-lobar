<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

// import model sesuai kebutuhan
use App\Models\DataProposal;
use App\Models\DataGuruAgamaBuddha;
use App\Models\DataVihara;
use App\Models\DataUmat;
use App\Models\LembagaKeagamaanBuddha;
use App\Models\LembagaPendidikanAgama;
use App\Models\ProgramBantuan;
use App\Models\Archive;
use App\Models\ArsipKeuangan;

class ExportPdfController extends Controller
{
    public function exportProposal() {
        $proposals = DataProposal::all();
        return Pdf::loadView('unduh.proposal', compact('proposals'))->download('proposal.pdf');
    }

    public function exportGuru() {
        $gurus = DataGuruAgamaBuddha::all();
        return Pdf::loadView('unduh.guru', compact('gurus'))->download('guru.pdf');
    }

    public function exportVihara() {
        $viharas = DataVihara::all();
        return Pdf::loadView('unduh.vihara', compact('viharas'))->download('vihara.pdf');
    }

    public function exportUmat() {
        $umats = DataUmat::all();
        return Pdf::loadView('unduh.umat', compact('umats'))->download('data-umat.pdf');
    }

    public function exportKeagamaan() {
        $data = LembagaKeagamaanBuddha::all();
        return Pdf::loadView('unduh.lembaga-keagamaan', compact('data'))->download('lembaga-keagamaan.pdf');
    }

    public function exportPendidikan() {
        $data = LembagaPendidikanAgama::all();
        return Pdf::loadView('unduh.pendidikan', compact('data'))->download('lembaga-pendidikan.pdf');
    }

    public function exportBantuan() {
        $data = ProgramBantuan::all();
        return Pdf::loadView('unduh.bantuan', compact('data'))->download('bantuan.pdf');
    }

    public function exportArsip() {
        $data = Archive::all();
        return Pdf::loadView('unduh.arsip', compact('data'))->download('arsip.pdf');
    }

    public function exportArsipKeuangan()
    {
        $arsip = ArsipKeuangan::all(); // variabel harus bernama 'arsip'
        return Pdf::loadView('unduh.arsip-keuangan', compact('arsip'))
                ->download('arsip-keuangan.pdf');
    }
}