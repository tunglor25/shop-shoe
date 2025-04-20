<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    /**
     * Hiển thị danh sách bình luận
     */
    public function index(Request $request)
    {
        $title = 'Quản lý Bình luận';

        $query = Comment::with(['user', 'product', 'replies'])
            ->withCount('replies')
            ->whereNull('parent_id') // Chỉ lấy bình luận gốc
            ->latest();

        // Tìm kiếm
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('content', 'like', "%{$search}%")
                  ->orWhereHas('user', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                  })
                  ->orWhereHas('product', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Lọc theo trạng thái
        if ($request->has('status') && in_array($request->status, ['active', 'hidden'])) {
            $query->where('status', $request->status);
        }

        // Lọc bình luận có phản hồi
        if ($request->has('has_replies') && $request->has_replies === 'true') {
            $query->has('replies');
        }
        // lấy nguời dùng bình luận
        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        $comments = $query->paginate(15)->withQueryString();

        return view('admin.comments.index', compact('title', 'comments'));
    }

    /**
     * Thay đổi trạng thái bình luận (active/hidden)
     */
    public function toggleStatus(Comment $comment)
    {
        $newStatus = $comment->status === 'active' ? 'hidden' : 'active';
        $comment->update(['status' => $newStatus]);

        $action = $newStatus === 'active' ? 'hiển thị' : 'ẩn';
        return back()->with('success', "Đã {$action} bình luận #{$comment->id}");
    }

    /**
     * Xóa bình luận
     */
    public function destroy(Comment $comment)
    {
        // Xóa tất cả các phản hồi trước
        $comment->replies()->delete();

        // Sau đó xóa bình luận chính
        $comment->delete();

        return back()->with('success', "Đã xóa bình luận #{$comment->id} và tất cả phản hồi");
    }
}
