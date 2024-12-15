<?php 
namespace App\Controllers;

use App\Models\Todo\Todos;

class EditTodo extends BaseController
{
    public function edit($id)
    {
        $todoModel = new Todos();
        $subject = $todoModel->subId($id);

        if ($subject) {
            return view('EditSub', ['subject' => $subject]);
        } 
    }

    public function update($id)
    {
        $todoModel = new Todos();
    
        if (!$this->validate([
            'subject' => [
                'rules' => 'required|min_length[6]|regex_match[/^[^0-9]*$/]',
                'errors' => [
                    'required' => 'Tên môn học không được để trống.',
                    'min_length' => 'Tên môn học phải có ít nhất 6 ký tự.',
                    'regex_match' => 'Tên môn học không được chứa số.',
                ],
            ],
            'description' => [
                'rules' => 'required|min_length[6]|regex_match[/^[^0-9]*$/]',
                'errors' => [
                    'required' => 'Mô tả không được để trống.',
                    'min_length' => 'Mô tả phải có ít nhất 6 ký tự.',
                    'regex_match' => 'Mô tả không được chứa số.',
                ],
            ],
        ])) {
            return view('EditSub', [
                'subject' => array_merge(['id' => $id], $this->request->getPost()), // Giữ lại dữ liệu đã nhập
                'validation' => $this->validator, 
                'error' => 'Dữ liệu không hợp lệ',
            ]);
        }
    
        $todoModel->update($id, [
            'subject' => $this->request->getPost('subject'),
            'description' => $this->request->getPost('description'),
            'updated_at' => $this->request->getPost('updated_at'),
        ]);
    
        session()->setFlashdata('success', 'Cập nhật môn học thành công!');
    
        return view('EditSub', [
            'subject' => $todoModel->find($id), 
            'success' => 'Cập nhật môn học thành công!', 
        ]);    }
}    

?>