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
<form action="{{ route('dashboard.update', $car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- تحديد طريقة PUT لعملية التعديل -->

        <!-- الحقول الأخرى هنا مثل العلامة التجارية، الموديل، السنة، إلخ -->

        <div class="form-row">
            <div class="form-group">
                <input type="text" name="brand" placeholder="العلامة التجارية" value="{{ old('brand', $car->brand) }}" required>
                @error('brand') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <input type="text" name="model" placeholder="موديل السيارة" value="{{ old('model', $car->model) }}" required>
                @error('model') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <input type="number" name="year" placeholder="سنة السيارة" value="{{ old('year', $car->year) }}" required>
                @error('year') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <input type="number" name="price" placeholder="سعر السيارة" value="{{ old('price', $car->price) }}" required>
                @error('price') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <textarea name="description" placeholder="وصف السيارة" required>{{ old('description', $car->description) }}</textarea>
                @error('description') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <input type="text" name="color" placeholder="اللون" value="{{ old('color', $car->color) }}" required>
                @error('color') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <input type="text" name="city" placeholder="المدينة" value="{{ old('city', $car->city) }}" required>
                @error('city') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <input type="text" name="country" placeholder="البلد" value="{{ old('country', $car->country) }}" required>
                @error('country') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group">
            <input type="number" name="speed" placeholder="سرعة" value="{{ old('speed', $car->speed) }}" required>
            @error('speed') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <input type="text" name="fuel_type" placeholder="الوقود" value="{{ old('fuel_type', $car->fuel_type) }}" required>
            @error('fuel_type') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <!-- صور السيارة -->
        <div class="form-row">
            <label>صور السيارة (حد أقصى 3 صور):</label>
            <div id="image-upload-container">
                @if($car->car_images && is_array($car->car_images))
                    @foreach($car->car_images as $path)
                        <div class="image-upload">
                            <img src="{{ asset('storage/' . $path) }}" width="100" alt="Car Image">
                            <!-- زر لحذف الصورة (اختياري) -->
                            <button type="button" class="remove-image-btn" onclick="removeImage(this)">حذف</button>
                        </div>
                    @endforeach
                @endif

                <!-- حقل رفع صورة جديدة -->
                <div class="image-upload">
                    <input type="file" name="car_images[]" accept="image/*">
                </div>
            </div>
            <button type="button" class="add-image-btn" onclick="addImageInput()">إضافة صورة أخرى</button>
            @error('car_images') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-row">
            <label><input type="checkbox" name="sold" value="1" {{ old('sold', $car->sold) ? 'checked' : '' }}> هل تم بيع السيارة؟</label>
            <label><input type="checkbox" name="show_complaints" value="1" {{ old('show_complaints', $car->show_complaints) ? 'checked' : '' }}> عرض الشكاوى</label>
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

@endsection
