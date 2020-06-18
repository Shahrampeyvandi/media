
                    <div
                    class="information w-100 put-right  fs-0-9 fw-300 light-80 dark-white mt-xl mb-5 pr-2 border-t-1">
                   
                   
                    <div class="d-flex">
                        <div class="d-tc w-20 py-xs light-60 dark-110">مدت </div>
                        <div class="d-tc py-xs  float-left">{{$content->duration}}</div>
                    </div>
                    <div class="d-flex">
                        <div class="d-tc w-20 py-xs light-60 dark-110">زبان </div>
                        <div class="d-tc py-xs">
                            <span class="text float-left">{{$content->languages->name}}</span>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="d-tc w-20 py-xs light-60 dark-110">موضوع </div>
                        <div class="d-tc py-xs">
                            <span class="text float-left">{{$content->subjects->name}}</span>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="d-tc w-20 py-xs light-60 dark-110">سطح </div>
                        <div class="d-tc py-xs">
                            <span class="text float-left">

                                {{$content->levels->name}}
                            </span>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="d-tc w-20 py-xs light-60 dark-110">تاریخ </div>
                        <div class="d-tc py-xs">
                            {{\Morilog\Jalali\Jalalian::forge($content->created_at)->format('%d %B %Y')}}</div>
                    </div>
                </div>