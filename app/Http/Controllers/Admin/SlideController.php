<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlideRequest;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Hiển thị danh sách các slide đang hoạt động
     */
    public function index(Request $request)
    {
        $title = 'Danh sách slide';
        $slides = Slide::where('status', 1)
            ->orderByDesc('id')
            ->paginate(5);

        return view('admin.slides.index', compact('title', 'slides'));
    }

    /**
     * Hiển thị form tạo slide mới
     */
    public function create()
    {
        $title = 'Thêm mới slide';
        return view('admin.slides.create', compact('title'));
    }

    /**
     * Lưu slide mới vào cơ sở dữ liệu
     */
    public function store(SlideRequest $request)
    {
        $data = $request->validated();

        $data = $request->validated();

        // Xử lý upload ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('uploads/slides', 'public');
            $data['image'] = $imagePath;
        }


        Slide::create($data);

        return redirect()->route('admin.slides.index')
            ->with('success', 'Thêm mới slide thành công');
    }

    /**
     * Hiển thị chi tiết một slide cụ thể
     */
    public function show(Slide $slide)
    {
        if ($slide->status != 1) {
            abort(404);
        }

        $title = 'Chi tiết slide';
        return view('admin.slides.show', compact('title', 'slide'));
    }

    /**
     * Hiển thị form chỉnh sửa slide
     */
    public function edit(Slide $slide)
    {
        $title = 'Sửa slide';
        return view('admin.slides.edit', compact('title', 'slide'));
    }

    /**
     * Cập nhật thông tin slide
     */
    public function update(SlideRequest $request, Slide $slide)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            // Lưu ảnh mới
            $image = $request->file('image');
            $imagePath = $image->store('uploads/slides', 'public');
            $data['image'] = $imagePath;

            // Xóa ảnh cũ nếu tồn tại
            if ($slide->image) {
                Storage::disk('public')->delete($slide->image);
            }
        } else {
            // Giữ nguyên ảnh cũ nếu không có ảnh mới
            $data['image'] = $slide->image;
        }

        $slide->update($data);

        return redirect()->route('admin.slides.index')
            ->with('success', 'Cập nhật slide thành công');
    }

    /**
     * Ẩn slide bằng cách cập nhật trạng thái
     */
    public function destroy(Slide $slide)
    {
        $slide->update(['status' => 0]);

        // Nếu muốn xóa vĩnh viễn và ảnh:
        /*
        if ($slide->image) {
            Storage::disk('public')->delete($slide->image);
        }
        $slide->delete();
        */

        return redirect()->route('admin.slides.index')
            ->with('success', 'Đã ẩn slide thành công!');
    }

    /**
     * Khôi phục slide bị ẩn (nếu có hỗ trợ soft delete)
     */
    public function restore($id)
    {
        $slide = Slide::withTrashed()->findOrFail($id);
        $slide->restore();

        return redirect()->route('admin.slides.index')
            ->with('success', 'Đã khôi phục slide thành công!');
    }
}
