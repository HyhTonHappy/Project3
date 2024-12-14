<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Môn học</title>
    <style>
        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Danh sách Môn học</h1>
    
    <?php if (session()->getFlashdata('message')): ?>
        <div class="success">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="error">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($subjects)): ?>
        <a href="/add_Sub">Thêm môn học</a>

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Môn học</th>
                    <th>Mô tả</th>
                    <th>Ngày tạo</th>
                    <th>Chỉnh sửa</th>
                    <th>Xoá</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($subjects as $subject): ?>
                    <tr>
                        <td><?= esc($subject['id']) ?></td>
                        <td><?= esc($subject['subject']) ?></td>
                        <td><?= esc($subject['description']) ?></td>
                        <td><?= esc($subject['created_at']) ?></td>
                        <td><a href="/editSub/<?= esc($subject['id']) ?>"><button>Chỉnh sửa</button></a></td>
                        <td>
                            <a href="/deleteSub/<?= esc($subject['id']) ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa môn học này?');">
                                <button>Xoá</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Không có môn học nào trong danh sách.</p>
    <?php endif; ?>
</body>
</html>
