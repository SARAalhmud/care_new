@extends('layouts.navigation')
@section('nav')
<style>
    .form-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 20px;
    }

    .form-group {
        flex: 1;
        min-width: 45%;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 2px solid black;
        border-radius: 8px;
        color: black;
        transition: border-color 0.3s;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    textarea:focus {
        outline: none;
        border-color: gold;
    }

    textarea {
        resize: vertical;
        height: 120px;
    }

    .image-upload {
        margin-bottom: 10px;
    }

    .add-image-btn {
        background-color: black;
        color: gold;
        padding: 5px 10px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    button[type="submit"] {
        background-color: black;
        color: gold;
        padding: 10px 20px;
        border: none;
        border-radius: 10px;
        margin-top: 20px;
        cursor: pointer;
    }
    .text-muted {
  color: rgb(51, 49, 49) !important;
}

    body {
        background-color: #f4f4f4;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
    }

    form {
        background-color: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        max-width: 900px;
        margin: 30px auto;
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 20px;
    }

    .form-group {
        flex: 1;
        min-width: 45%;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #fafafa;
        transition: all 0.3s ease;
    }

    input:focus,
    textarea:focus {
        border-color: #c59d5f;
        outline: none;
        background-color: #fff;
    }

    textarea {
        resize: vertical;
        height: 120px;
    }

    .add-image-btn,
    button[type="submit"] {
        background-color: #000;
        color: #c59d5f;
        font-weight: bold;
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .add-image-btn:hover,
    button[type="submit"]:hover {
        background-color: #333;
        color: #ffd700;
    }

    label {
        font-weight: bold;
        margin-bottom: 8px;
        display: inline-block;
    }

    .alert {
        padding: 10px 15px;
        border-radius: 6px;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .alert-success {
        background-color: #e6f9f0;
        border: 1px solid #28a745;
        color: #28a745;
    }

    .alert-danger {
        background-color: #ffe6e6;
        border: 1px solid #dc3545;
        color: #dc3545;
    }

    .btn {
        display: inline-block;
        padding: 8px 16px;
        margin-bottom: 20px;
        background-color: #ffc107;
        color: #000;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
    }

</style>


@if (session('success'))
    <div class="alert alert-success" style="background-color: white; border: 1px solid #28a745; color: #28a745;">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" style="background-color: white; border: 1px solid #dc3545; color: #dc3545;">
        {{ session('error') }}
    </div>
@endif

<a href="{{ route('dashboard.create' ) }}" class="btn btn-warning fw-bold px-4">
  عرض جميع السيارات
</a>
<form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-row">
        <div class="form-group">
            <input type="text" name="brand" placeholder="العلامة التجارية" value="{{ old('brand') }}" required>
            @error('brand') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <input type="text" name="model" placeholder="موديل السيارة" value="{{ old('model') }}" required>
            @error('model') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <input type="number" name="year" placeholder="سنة السيارة" value="{{ old('year') }}" required>
            @error('year') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <input type="number" name="price" placeholder="سعر السيارة" value="{{ old('price') }}" required>
            @error('price') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <textarea name="description" placeholder="وصف السيارة" required>{{ old('description') }}</textarea>
            @error('description') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <input type="text" name="color" placeholder="اللون" value="{{ old('color') }}" required>
            @error('color') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <input type="text" name="city" placeholder="المدينة" value="{{ old('city') }}" required>
            @error('city') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <input type="text" name="country" placeholder="البلد" value="{{ old('country') }}" required>
            @error('country') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="form-group">
        <input type="number" name="speed" placeholder="سرعة" value="{{ old('speed') }}" required>
        @error('speed') <div class="alert alert-danger">{{ $message }}</div> @enderror
    </div>
</div>
<div class="form-group">
    <input type="text" name="fuel_type" placeholder="الوقود" value="{{ old('fuel_type') }}" required>
    @error('fuel_type') <div class="alert alert-danger">{{ $message }}</div> @enderror
</div>
</div>
    <div class="form-row">
        <label>صور السيارة (حد أقصى 3 صور):</label>
        <div id="image-upload-container">
            <div class="image-upload">
                <input type="file" name="car_images[]" accept="image/*">
            </div>
        </div>
        <button type="button" class="add-image-btn" onclick="addImageInput()">إضافة صورة أخرى</button>
        @error('car_images') <div class="alert alert-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-row">
        <label><input type="checkbox" name="sold" value="1" {{ old('sold') ? 'checked' : '' }}> هل تم بيع السيارة؟</label>
    <!-- حقل مخفي بقيمة 0 (يتفعّل فقط إذا ما تم اختيار الـ checkbox) -->
<input type="hidden" name="show_complaints" value="0">

<!-- الـ checkbox نفسه -->
<label>
    <input type="checkbox" name="show_complaints" value="1" {{ old('show_complaints') ? 'checked' : '' }}>
    عرض الشكاوى
</label>
  </div>

    <button type="submit">حفظ بيانات السيارة</button>
</form>

<script>
    function addImageInput() {
        const container = document.getElementById('image-upload-container');
        const currentUploads = container.querySelectorAll('input[type="file"]').length;

        if (currentUploads < 3) {
            const newInput = document.createElement('div');
            newInput.classList.add('image-upload');
            newInput.innerHTML = `<input type="file" name="car_images[]" accept="image/*">`;
            container.appendChild(newInput);
        } else {
            alert("لا يمكنك رفع أكثر من 3 صور.");
        }
    }
</script>


<script>
    // لتفعيل زر حذف الصورة
    const removeButtons = document.querySelectorAll('.remove-image-btn');
    removeButtons.forEach(button => {
        button.addEventListener('click', () => {
            const imageDiv = button.parentElement;
            imageDiv.querySelector('input[type="file"]').value = ''; // مسح القيمة
            imageDiv.style.display = 'none'; // إخفاء الصورة
        });
    });
</script>


@endsection
