@extends('site.layouts.master')
@section('content')
@if(session('error'))
    <script>
        window.onload = function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
            });
        };
    </script>
@endif
@if(session('success'))
    <script>
        window.onload = function() {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
            });
        };
    </script>
@endif

<!-- Content Display -->
<div class="section padding-tb-100px section-ba-3">
    <div class="container">
        <div class="section-title margin-bottom-40px">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="icon text-main-color"></div>
                    <div class="h2">{{ trans('main.Course Item Content') }}</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 sm-mb-35px my-lg-5 my-3">
                <div class="blog-item">
                    <div class="img container w-75 mx-auto">
                        <div id="content">
                            {!! $courseItemContent->iframe !!}
                        </div>
                        @if($courseItemContent->photo)
                        <div id="file">
                            <span>{{ $courseItemContent->photo }}</span>
                            <br>
                            {{-- <a class="btn btn-outline-success btn-sm" href="{{ route('show_file',['course-item-content',$courseItemContent->photo]) }}" role="button" target="_blank"><i class="fa fa-eye"></i></a> --}}
                            <a class="btn background-main-color text-white btn-sm" href="{{ route('download_file',['course-item-content',$courseItemContent->photo]) }}" role="button" target="_blank"><i class="fa fa-download"></i> {{ trans('main.Download File') }}</a>
                        </div>
                        @endif
                        <div class="d-flex gap-3">
                            <button id="previousButton" class="btn p-2 btn-sm border-radius-30 margin-tb-20px text-white background-main-color box-shadow d-block" onclick="navigateTo('previous')">{{ trans('main.Previous Video') }}</button>
                            <button id="nextButton" class="btn p-2 btn-sm border-radius-30 margin-tb-20px text-white background-main-color box-shadow d-block" onclick="navigateTo('next')">{{ trans('main.Next Video') }}</button>
                        </div>
                        
                        <script>
                            // JavaScript to handle next/previous navigation
                            const courseItemContents = @json($courseItemContents);
                            let currentIndex = courseItemContents.findIndex(item => item.id === {{ $courseItemContent->id }});
                        
                            function navigateTo(direction) {
                                if (direction === 'previous' && currentIndex > 0) {
                                    currentIndex--;
                                } else if (direction === 'next' && currentIndex < courseItemContents.length - 1) {
                                    currentIndex++;
                                }
                        
                                // Get the name of the current item
                                const itemName = courseItemContents[currentIndex].name_ar || courseItemContents[currentIndex].name_en;
                        
                                // Construct the URL for the desired route
                                const url = `{{ route('site.courseItemContent', ':name') }}`.replace(':name', encodeURIComponent(itemName));
                        
                                // Redirect to the new URL
                                window.location.href = url;
                        
                                // Update button styles based on the current index
                                updateButtonStyles();
                            }
                        
                            function updateButtonStyles() {
                                const previousButton = document.getElementById('previousButton');
                                const nextButton = document.getElementById('nextButton');
                        
                                // Update button styles based on the current index
                                if (currentIndex === 0) {
                                    previousButton.classList.add('background-grey-2');
                                    previousButton.classList.remove('background-main-color');
                                } else {
                                    previousButton.classList.add('background-main-color');
                                    previousButton.classList.remove('background-grey-2');
                                }
                        
                                if (currentIndex === courseItemContents.length - 1) {
                                    nextButton.classList.add('background-grey-2');
                                    nextButton.classList.remove('background-main-color');
                                } else {
                                    nextButton.classList.add('background-main-color');
                                    nextButton.classList.remove('background-grey-2');
                                }
                            }
                        
                            // Initial update of button styles
                            updateButtonStyles();
                        </script>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript to handle next/previous navigation
    const courseItemContents = @json($courseItemContents);
    let currentIndex = courseItemContents.findIndex(item => item.id === {{ $courseItemContent->id }});

    function navigateTo(direction) {
        if (direction === 'previous' && currentIndex > 0) {
            currentIndex--;
        } else if (direction === 'next' && currentIndex < courseItemContents.length - 1) {
            currentIndex++;
        }

        // Get the name of the current item
        const itemName = courseItemContents[currentIndex].name_ar || courseItemContents[currentIndex].name_en;

        // Construct the URL for the desired route
        const url = `{{ route('site.courseItemContent', ':name') }}`.replace(':name', encodeURIComponent(itemName));

        // Redirect to the new URL
        window.location.href = url;
    }

    // Disable/Enable buttons based on the current index
    document.getElementById('previousButton').disabled = (currentIndex === 0);
    document.getElementById('nextButton').disabled = (currentIndex === courseItemContents.length - 1);
</script>
@endsection
