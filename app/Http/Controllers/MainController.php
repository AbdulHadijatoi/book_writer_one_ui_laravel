<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class MainController extends Controller
{
    // Generate PDF
    public function createPDF() {
        // retreive all records from db
        $data = Book::all();
        // share data to view
        view()->share('employee',$data);
        // $pdf = PDF::loadView('pdf_view', $data);
        // download PDF file with download method
        // return $pdf->download('pdf_file.pdf');
    }
}
