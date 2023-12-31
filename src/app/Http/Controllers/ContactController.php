<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Models\User;
use App\Models\Category;

class ContactController extends Controller
{
    public function show()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $form = $request->only([
            'fullname',
            'gender',
            'email',
            'postcode',
            'address',
            'building_name',
            'opinion'
        ]);
        $category = $request->only([
            'category_id'
        ]);

        return redirect('confirm', compact('form','category'));
    }

    public function send(Request $request)
    {
        if ($request->get('action') === 'back') {
            return redirect()->route('form.show')->withInput();
        }

        $form =  $request->only([
            'fullname',
            'gender',
            'email',
            'postcode',
            'address',
            'building_name',
            'opinion'
        ]);
        Contact::create($form)->with('category')->get();;

        return view('thanks');
    }

    public function manage(Request $request)
    {
        $result = Contact::paginate(10);
        return view('management', ['forms' => $result]);
    }

    public function search(Request $request)
    {
        $request->only([
            'fullname',
            'gender',
            'email',
            'postcode',
            'address',
            'building_name',
            'opinion'
        ]);
        if ($request->gender == '0') {
            if ($request->created_from == null && $request->created_to !== null) {
                $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
                ->whereDate('created_at', '<=', "{$request->created_to}")
                ->where('email', 'LIKE', "%{$request->email}%")
                ->paginate(10);
                return view('management', ['forms' => $result]);
            } elseif ($request->created_from !== null && $request->created_to == null) {
                $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
                ->whereDate('created_at', '>=', "{$request->created_from}")
                ->where('email', 'LIKE', "%{$request->email}%")
                ->paginate(10);
                return view('management', ['forms' => $result]);
            } elseif ($request->created_from == null && $request->created_to == null) {
                $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
                ->where('email', 'LIKE', "%{$request->email}%")
                ->paginate(10);
                return view('management', ['forms' => $result]);
            } else {
                $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
                ->whereDate('created_at', '<=', "{$request->created_to}")
                ->whereDate('created_at', '>=', "{$request->created_from}")
                ->where('email', 'LIKE', "%{$request->email}%")
                ->paginate(10);
                return view('management', ['forms' => $result]);
            }
        }
        if ($request->created_from == null && $request->created_to !== null) {
            $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
            ->where('gender', $request->gender)
            ->whereDate('created_at', '<=', "{$request->created_to}")
            ->where('email', 'LIKE', "%{$request->email}%")
            ->paginate(10);
            return view('management', ['forms' => $result]);
        } elseif ($request->created_from !== null && $request->created_to == null) {
            $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
            ->where('gender', $request->gender)
            ->whereDate('created_at', '>=', "{$request->created_from}")
            ->where('email', 'LIKE', "%{$request->email}%")
            ->paginate(10);
            return view('management', ['forms' => $result]);
        } elseif ($request->created_from == null && $request->created_to == null) {
            $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
            ->where('gender', $request->gender)
            ->where('email', 'LIKE', "%{$request->email}%")
            ->paginate(10);
            return view('management', ['forms' => $result]);
        } else {
            $result = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")
            ->where('gender', $request->gender)
            ->whereDate('created_at', '<=', "{$request->created_to}")
            ->whereDate('created_at', '>=', "{$request->created_from}")
            ->where('email', 'LIKE', "%{$request->email}%")
            ->paginate(10);
            return view('management', ['forms' => $result]);
        }
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        if ($request->currentPage == 1) {
            return redirect($request->firstPage);
        } else {
            return back();
        }
    }


    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }


}