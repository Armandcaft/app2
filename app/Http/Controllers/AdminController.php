<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')
                     ->where('user_id', '=', auth()->user()->id)
                     ->paginate(10);

        $categories = Category::latest()->paginate(5);
        // dd($posts);

        $users = User::all();

        return view('admin.index', [
            'posts' => $posts,
            'users' => $users,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * After installing the Spreadsheet package
     * *composer require phpoffice/phpspreadsheet --prefer-source
     * *composer install
     *
     * @param [type] $type
     * @return void
     */
    // public function export($type) {
    //     $posts = Post::all();
    //     $spreadsheet = new Spreadsheet();
    //     $sheet = $spreadsheet->getActiveSheet();
    //     $sheet->setCellValue('A1', 'Id');
    //     $sheet->setCellValue('C1', 'Title');
    //     $sheet->setCellValue('B1', 'Excerpt');
    //     $sheet->setCellValue('D1', 'Body');
    //     $sheet->setCellValue('E1', 'Image path');
    //     $sheet->setCellValue('E1', 'Reading time in minutes');
    //     $sheet->setCellValue('F1', 'User that published');
    //     $rows = 2;
    //     foreach($posts as $empDetails){
    //     $sheet->setCellValue('A' . $rows, $empDetails['id']);
    //     $sheet->setCellValue('B' . $rows, $empDetails['title']);
    //     $sheet->setCellValue('C' . $rows, $empDetails['excerpt']);
    //     $sheet->setCellValue('D' . $rows, $empDetails['body']);
    //     $sheet->setCellValue('E' . $rows, $empDetails['image_path']);
    //     $sheet->setCellValue('F' . $rows, $empDetails['min_to_read']);
    //     $rows++;
    //     }
    //     $fileName = "posts.".$type;
    //     if($type == 'xlsx') {
    //     $writer = new Xlsx($spreadsheet);
    //     } else if($type == 'xls') {
    //     $writer = new Xls($spreadsheet);
    //     }
    //     $writer->save("export/".$fileName);
    //     header("Content-Type: application/vnd.ms-excel");
    //     return redirect(url('/')."/export/".$fileName);
    // }
}
