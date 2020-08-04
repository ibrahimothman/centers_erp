<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\StatementTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatementTemplateController extends Controller
{

    public function create()
    {
        return view('statement/editor');
    }


    public function store(Request $request)
    {
        return view('statement/editor');
    }



    public function saveStatementTemplate(Request $request){
        //todo validate ajax and empty body
        $statementTemplate=new StatementTemplate();
        $statementTemplate->body=$request->input('body');
        $statementTemplate->save();
        return "Template was saved successfully";
    }
}
