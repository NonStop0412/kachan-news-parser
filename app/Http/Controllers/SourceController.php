<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSource;
use App\Http\Requests\EditSource;
use App\Models\Source;
use Illuminate\Support\Facades\Request;


class SourceController extends Controller
{
    public function sources()
    {
        $sources = Source::paginate(10);

        return view('admin.sources', ['sources' => $sources]);
    }

    public function changeStatusSource(int $id)
    {
        $source = Source::find($id);

        $formResult = static function (string $message, bool $isSuccess, bool $status){
            return [
                'message' => $message,
                'success' => $isSuccess,
                'status' => $status
            ];
        };

        if ($source->is_active === 0) {
            $source->activate();

            return response()->json($formResult('Successful',true, true));
        }

        $source->deactivate();

        return response()->json($formResult('Successful',true, false));
    }


    public function addFormSource()
    {
        return view('admin.addFormSource');
    }

    public function addSource(AddSource $request)
    {
        $name = $request->get('name');
        $url = $request->get('url');
        (Source::create($name, $url));
        \session()->flash('message', 'Source has been created!');

        return redirect()->route('admin.sources');
    }
    public function editFormSource(int $id)
    {
        $source = Source::find($id);
        if (!is_object($source)){
            return redirect()->route('admin.sources');
        }

        return view('admin.editFormSource', ['source' => $source]);
    }

    public function editSource(EditSource $request)
    {
        $id = $request->get('id');
        $name = $request->get('name');
        $url = $request->get('url');
        $active = (int) $request->get('active', 0);
        $source = Source::find($id);

        if (!is_object($source)){

            return redirect()->route('admin.sources');
        }

        $source->edit($name, $url, $active);
        \session()->flash('message', 'Source has been edited!');

        return redirect()->route('admin.sources');
    }
}
