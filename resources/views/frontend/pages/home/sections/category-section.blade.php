<section class="wsus__category_4 mt_190 xs_mt_100">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 m-auto wow fadeInUp">
                <div class="wsus__section_heading mb_35">
                    <h5>Categories</h5>
                    <h2>Explore Categories</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($featuredCategories as $category)
                @php
                    // حساب عدد الدورات في التصنيف الرئيسي
                    $mainCourses = $category->courses->count();

                    // حساب عدد الدورات في كل التصنيفات الفرعية
                    $subCourses = $category->subCategories->sum(function ($sub) {
                        return $sub->courses->count();
                    });

                    // المجموع الكلي
                    $totalCourses = $mainCourses + $subCourses;
                @endphp

                <div class="col-xxl-3 col-md-6 col-lg-4 wow fadeInUp">
                    <a href="{{ route('courses.index', ['main_category' => $category->slug]) }}"
                        class="wsus__single_category_4">
                        <div class="icon">
                            <img src="{{ asset($category->image) }}" alt="category" class="img-fluid w-100">
                        </div>
                        <div class="text">
                            <h4>{{ $category->name }}</h4>
                            <p>{{ $totalCourses }} {{ Str::plural('Course', $totalCourses) }}</p>
                        </div>
                    </a>
                </div>
            @endforeach


        </div>

    </div>
</section>
