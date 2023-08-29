<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Supplier as ModelsSupplier;
use Config\Services;

class Supplier extends BaseController
{
    public function index()
    {
        $supplierModel = new ModelsSupplier();

        $data = [
            'suppliers' => $supplierModel->findAll()
        ];

        return view('supplier/view', $data);
    }

    function create()
    {
        return view('supplier/create');
    }

    function submit()
    {
        $validation = Services::validation();

        $validation->setRules([
            'name' => ['label' => 'supplier name', 'rules' => 'required|is_unique[supplier.name]'],
        ]);

        if(!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $supplierModel = new ModelsSupplier();

        $supplierModel->save([
            'name' => $this->request->getPost('name'),
        ]);

        return redirect()->route('supplier.view')->with('message', 'success');
    }

    function delete($id) 
    {
        $supplierModel = new ModelsSupplier();
        $supplierModel->delete($id);

        return redirect()->route('supplier.view')->with('message', 'supllier deleted');

    }
}
