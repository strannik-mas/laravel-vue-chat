<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Start') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" id="app">
                    <!--{{ __("You're logged in!") }}
                    <div id="app">
                        <prop-component :urldata="{{json_encode($url_data)}}"></prop-component>
                    </div>-->
                </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="movies-tab" data-toggle="tab" href="#movies" role="tab" aria-controls="movies"
                               aria-selected="true">Example</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="scheduled-movies-tab" data-toggle="tab" href="#scheduled-movies" role="tab"
                               aria-controls="scheduled-movies" aria-selected="false">Props component</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="group-movies-tab" data-toggle="tab" href="#group-movies" role="tab" aria-controls="group-movies"
                               aria-selected="false">Ajax component</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show" id="movies" role="tabpanel" aria-labelledby="movies-tab">
                            <hello-vue></hello-vue>
                            {{ __("You're logged in!") }}
                        </div>
                        <div class="tab-pane fade" id="scheduled-movies" role="tabpanel" aria-labelledby="scheduled-movies-tab">
                            <prop-component :urldata="{{json_encode($url_data)}}"></prop-component>
                        </div>
                        <div class="tab-pane fade" id="group-movies" role="tabpanel" aria-labelledby="group-movies-tab">
                            <ajax-component></ajax-component>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
