<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
class GradeSystemController extends Controller
{
    public function addResult()
    {
    	return view('admin.add_result');
    }
    public function saveResult(Request $request)
    {
    	//return $request->all();
    	$addResult = [];
    	$addResult['subject_code'] = $request->subject_code;
    	$addResult['subject_name'] = $request->subject_name;
    	$addResult['subject_marks'] = $request->subject_marks;
    	if ($addResult['subject_marks'] >= 80) {
    		$addResult['grade'] = 'A+';
    		$addResult['gpa'] = 5.00;
    	}elseif ($addResult['subject_marks'] >= 70) {
    		$addResult['grade'] = 'A';
    		$addResult['gpa'] = '4.00';
    	}elseif ($addResult['subject_marks'] >= 60) {
    		$addResult['grade'] = 'A-';
    		$addResult['gpa'] = '3.50';
    	}elseif ($addResult['subject_marks'] >= 50) {
    		$addResult['grade'] = 'B';
    		$addResult['gpa'] = '3.00';
    	}elseif ($addResult['subject_marks'] >= 40) {
    		$addResult['grade'] = 'C';
    		$addResult['gpa'] = '2.00';
    	}elseif ($addResult['subject_marks'] >= 33) {
    		$addResult['grade'] = 'D';
    		$addResult['gpa'] = '1.00';
    	}else {
    		$addResult['grade'] = 'F';
    		$addResult['gpa'] = '0.00';
    	}
    	$data = DB::table('tbl_grade_system')->insert($addResult);
    	return redirect('addResult');
    }
}
