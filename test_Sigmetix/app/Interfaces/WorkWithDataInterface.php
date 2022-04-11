<?php
namespace App\Interfaces;

use App\Models\User;
use Illuminate\Http\Request;

interface WorkWithDataInterface {
    public function __construct(string $connectionName);
    public function getAll():\Illuminate\Support\Collection;
    public function createModel(Request $request);
    public function deleteModel($id);
    public function updateModel(Request $request);
    public function getConnectionName():string;
}
