<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index()
    {
        $stats = Stat::orderBy('id')->get();
        return view('admin.stats.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.stats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'value' => 'required|string',
            'label' => 'required|string',
        ]);

        Stat::create($request->all());

        return redirect()->route('stats.index')
            ->with('success', 'Stat added successfully.');
    }

    public function edit($id)
    {
        $stat = Stat::findOrFail($id);
        return view('admin.stats.edit', compact('stat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'value' => 'required|string',
            'label' => 'required|string',
        ]);

        Stat::where('id', $id)->update($request->only('value', 'label'));

        return redirect()->route('stats.index')
            ->with('success', 'Stat updated successfully.');
    }

    public function destroy($id)
    {
        Stat::destroy($id);

        return redirect()->route('stats.index')
            ->with('success', 'Stat deleted successfully.');
    }
}
