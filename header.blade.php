@inject('request', 'Illuminate\Http\Request')
<!-- Main Header -->
<div class="modern-header no-print">
    <div class="tw-px-5 tw-py-3" style="position: relative; z-index: 1;">
        <div class="tw-flex tw-items-start tw-justify-between tw-gap-6 lg:tw-items-center">
            <div class="tw-flex tw-items-center tw-gap-3">
                <button type="button" 
                    class="header-btn header-btn-blue small-view-button xl:tw-w-20 lg:tw-hidden">
                    <span class="tw-sr-only">
                        Sidebar Menu
                    </span>
                    <div class="header-btn-icon">
                    <svg aria-hidden="true" class="tw-size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 6l16 0" />
                        <path d="M4 12l16 0" />
                        <path d="M4 18l16 0" />
                    </svg>
                    </div>
                </button>

                <button type="button"
                    class="header-btn header-btn-blue side-bar-collapse tw-hidden lg:tw-inline-flex">
                    <span class="tw-sr-only">
                        Collapse Sidebar
                    </span>
                    <div class="header-btn-icon">
                        <img src="https://epos.posifyme.com/img/icon/menu-flex.svg" alt="" style="width: 20px; height: 20px;">
                    </div>
                </button>
            </div>
            
            <div class="tw-flex tw-flex-wrap tw-items-center tw-justify-end tw-gap-3">
                @if (Module::has('Essentials'))
                    <button style="background-color: white;color: black" type="button" data-type="clock_in" data-toggle="tooltip" data-placement="bottom" title="Clock In"
                        class=" clock_in_btn header-btn header-btn-green tw-hidden sm:tw-inline-flex tw-inline-flex tw-items-center tw-justify-center tw-text-sm tw-font-medium tw-text-white tw-transition-all tw-duration-200 tw-bg-primary-800 hover:tw-bg-primary-700 tw-p-1.5 tw-rounded-lg tw-ring-1 hover:tw-text-white tw-ring-white/10">
                        <span class="tw-sr-only">
                            Clock In
                        </span>
                        <svg aria-hidden="true" class="tw-size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                            <path d="M7 11l5 5l5 -5" />
                            <path d="M12 4l0 12" />
                        </svg>
                    </button>
                @endif
                <details class="tw-dw-dropdown tw-relative tw-inline-block tw-text-left">
                        <summary class="header-btn header-btn-purple tw-cursor-pointer">
                            <div class="header-btn-icon">
                            <svg aria-hidden="true" class="tw-size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                <path d="M9 12h6" />
                                <path d="M12 9v6" />
                            </svg>
                            </div>
                        </summary>
                    <ul class="tw-dw-menu tw-dw-dropdown-content tw-dw-z-[1] tw-dw-bg-base-100 tw-dw-rounded-box tw-w-48 tw-absolute tw-left-0 tw-z-10 tw-mt-2 tw-origin-top-right tw-bg-white tw-rounded-lg tw-shadow-lg tw-ring-1 tw-ring-gray-200 focus:tw-outline-none"
                            role="menu" tabindex="-1">
                        <div class="tw-p-2" role="none">
                                <a href="{{ route('calendar') }}"
                                    class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                    role="menuitem" tabindex="-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect x="4" y="5" width="16" height="16" rx="2" />
                                        <line x1="16" y1="3" x2="16" y2="7" />
                                        <line x1="8" y1="3" x2="8" y2="7" />
                                        <line x1="4" y1="11" x2="20" y2="11" />
                                        <line x1="11" y1="15" x2="12" y2="15" />
                                        <line x1="12" y1="15" x2="12" y2="18" />
                                    </svg>
                                    Calendar  
                                </a>
                            @if (Module::has('Essentials'))
                                <a href="#"
                                    data-href="{{ action([\Modules\Essentials\Http\Controllers\ToDoController::class, 'create']) }}"
                                    data-container="#task_modal"
                                    class="btn-modal tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                    role="menuitem" tabindex="-1">
                                    <svg aria-hidden="true" class="tw-w-5 tw-h-5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                        <path d="M9 12l2 2l4 -4" />
                                    </svg>
                                    Add To Do                                
                                </a>
                            @endif
                            @if (auth()->user()->hasRole('Admin#' . auth()->user()->business_id))
                                <a href="#" id="start_tour"
                                    class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                    role="menuitem" tabindex="-1">
                                    <svg aria-hidden="true" class="tw-w-5 tw-h-5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                        <path d="M12 17l0 .01" />
                                        <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4" />
                                    </svg>
                                    Application Tour
                                </a>
                            @endif
                        </div>
                    </ul>
                </details>
                        @if (auth()->user()->hasRole('Admin#'.auth()->user()->business_id))
                            <div class="btn-group">
                                <button id="header_shortcut_dropdown" type="button" class="header-btn header-btn-orange" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="header-btn-icon">
                                        <i class="fas fa-cogs" style="font-size: 1.1rem;"></i>
                                    </div>
                                </button>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('/log-viewer') }}" target="_blank">
                                            <i class="fas fa-clipboard-list" aria-hidden="true"></i> System Logs
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('commands.optimize.clear') }}">
                                            <i class="fas fa-cog" aria-hidden="true"></i> Optimize:Clear
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('commands.route.clear') }}">
                                            <i class="fas fa-cogs" aria-hidden="true"></i> Optimize:Route
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/reports/product-stock-details') }}" target="_blank">
                                            <i class="fas fa-search" aria-hidden="true"></i> Product Mismatch
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        @endif
                <button id="btnCalculator" title="Calculator" data-content='<div id="calculator">
                    <div class="row text-center" id="calc">
                        <div class="calcBG col-md-12 text-center">
                        <div class="row" id="result">
                            <form name="calc">
                            <input type="text" class="screen text-right" name="result" readonly>
                            </form>
                        </div>
                        <div class="row">
                            <button id="allClear" type="button" class="btn btn-danger" onclick="clearScreen()">AC</button>
                            <button id="clear" type="button" class="btn btn-warning" onclick="clearScreen()">CE</button>
                            <button id="%" type="button" class="btn" onclick="calEnterVal(this.id)">%</button>
                            <button id="/" type="button" class="btn" onclick="calEnterVal(this.id)">÷</button>
                        </div>
                        <div class="row">
                            <button id="7" type="button" class="btn" onclick="calEnterVal(this.id)">7</button>
                            <button id="8" type="button" class="btn" onclick="calEnterVal(this.id)">8</button>
                            <button id="9" type="button" class="btn" onclick="calEnterVal(this.id)">9</button>
                            <button id="*" type="button" class="btn" onclick="calEnterVal(this.id)">x</button>
                        </div>
                        <div class="row">
                            <button id="4" type="button" class="btn" onclick="calEnterVal(this.id)">4</button>
                            <button id="5" type="button" class="btn" onclick="calEnterVal(this.id)">5</button>
                            <button id="6" type="button" class="btn" onclick="calEnterVal(this.id)">6</button>
                            <button id="-" type="button" class="btn" onclick="calEnterVal(this.id)">-</button>
                        </div>
                        <div class="row">
                            <button id="1" type="button" class="btn" onclick="calEnterVal(this.id)">1</button>
                            <button id="2" type="button" class="btn" onclick="calEnterVal(this.id)">2</button>
                            <button id="3" type="button" class="btn" onclick="calEnterVal(this.id)">3</button>
                            <button id="+" type="button" class="btn" onclick="calEnterVal(this.id)">+</button>
                        </div>
                        <div class="row">
                            <button id="0" type="button" class="btn" onclick="calEnterVal(this.id)">0</button>
                            <button id="." type="button" class="btn" onclick="calEnterVal(this.id)">.</button>
                            <button id="equals" type="button" class="btn btn-success" onclick="calculate()">=</button>
                            <button id="blank" type="button" class="btn">&nbsp;</button>
                        </div>
                        </div>
                    </div>
                    </div>'
                    type="button" data-trigger="click" data-html="true" data-placement="bottom" 
                    class="header-btn header-btn-green tw-hidden md:tw-inline-flex popover-default">
                    <span class="tw-sr-only" aria-hidden="true">
                        Calculator
                    </span>
                    <div class="header-btn-icon">
                    <svg aria-hidden="true" class="tw-size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 3m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                        <path d="M8 7m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" />
                        <path d="M8 14l0 .01" />
                        <path d="M12 14l0 .01" />
                        <path d="M16 14l0 .01" />
                        <path d="M8 17l0 .01" />
                        <path d="M12 17l0 .01" />
                        <path d="M16 17l0 .01" />
                    </svg>
                    </div>
                </button>
                @if (in_array('pos_sale', $enabled_modules))
                    @can('sell.create')
                        <a href="{{ action([\App\Http\Controllers\SellPosController::class, 'create']) }}"
                            class="pos-button sm:tw-inline-flex">
                            <svg aria-hidden="true" class="tw-size-5 tw-hidden md:tw-block" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                <path d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                <path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                <path d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                            </svg>
                            POS                        
                        </a>
                    @endcan
                @endif
                @if (Module::has('Repair'))
                    {{-- @includeIf('repair::layouts.partials.header') --}}
                @endif
                @can('profit_loss_report.view')                                       
                    <button type="button" id="view_todays_profit" title="{{ __('home.todays_profit') }}"
                        data-toggle="tooltip" data-placement="bottom"
                        class="header-btn header-btn-green tw-hidden sm:tw-inline-flex">
                        <span class="tw-sr-only">
                            Today's Profit
                        </span>
                        <div class="header-btn-icon">
                        <svg aria-hidden="true" class="tw-size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                            <path d="M3 6m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                            <path d="M18 12l.01 0" />
                            <path d="M6 12l.01 0" />
                        </svg>
                        </div>
                    </button>
                @endcan
                    <button type="button"
                        class="date-button tw-hidden lg:tw-inline-flex">
                        {{ @format_date('now') }}
                    </button>

                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu tw-list-none">
                    <a type="button"
                        class="header-btn notification-btn dropdown-toggle load_notifications tw-inline-flex"
                        data-toggle="dropdown" id="show_unread_notifications" data-loaded="false">
                        <span class="tw-sr-only">
                            Notifications
                        </span>
                        <div class="header-btn-icon">
                            <img src="{{ asset('img/icon/notification.svg') }}" alt="" style="width: 20px; height: 20px;">
                        </div>
                    </a>
                    <ul class="dropdown-menu !tw-p-2 !tw-w-80 tw-absolute !tw-right-0 !tw-z-10 !tw-mt-2 !tw-origin-top-right !tw-bg-white !tw-rounded-lg !tw-shadow-lg !tw-ring-1 !tw-ring-gray-200 !focus:tw-outline-none" style="left: auto !important ; height:90vh; overflow-y: scroll;">
                        <!-- <li class="header">You have 10 unread notifications</li> -->
                        <li>
                            <!-- inner menu: contains the actual data -->

                            <ul class="menu" id="notifications_list">
                            </ul>
                        </li>

                            </ul>
                </li>
                <input type="hidden" id="notification_page" value="1">
                {{-- ACLEDA Style Language Selector --}}
                <details class="tw-dw-dropdown tw-relative tw-inline-block tw-text-left">
                    <summary class="header-btn header-btn-purple tw-cursor-pointer">
                        @php
                            $currentLang = session()->get('user.language', auth()->user()->language ?? config('app.locale', 'en'));
                            $supportedLanguages = config('constants.langs', []);
                            
                            // Flag mapping matching ACLEDA's usage
                            $flagMapping = ['en' => 'us', 'kh' => 'kh', 'vi' => 'vn', 'ce' => 'cn', 'lo' => 'la'];

                            $languages = [];
                            foreach ($supportedLanguages as $langCode => $langData) {
                                $languages[$langCode] = [
                                    'name' => $langData['short_name'],
                                    'flag_code' => $flagMapping[$langCode] ?? 'un'
                                ];
                            }
                            $currentLanguage = $languages[$currentLang] ?? ['name' => 'English', 'flag_code' => 'us'];
                        @endphp

                        {{-- Small, clean flag icon --}}
                        <span class="fi fi-{{ $currentLanguage['flag_code'] }} tw-w-4 tw-rounded-[1px] tw-opacity-90"></span>
                        
                        <span>{{ $currentLanguage['name'] }}</span>
                        
                        {{-- Slim chevron --}}
                        <svg class="tw-w-3 tw-h-3 tw-text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>

                    {{-- Clean, White List Dropdown --}}
                    <ul class="tw-absolute tw-right-0 tw-z-50 tw-mt-1 tw-w-36 tw-origin-top-right tw-rounded-md tw-bg-white tw-py-1 tw-shadow-md tw-ring-1 tw-ring-black/5">
                        @foreach($languages as $langCode => $langData)
                            <li class="tw-list-none">
                                <a href="#" 
                                onclick="event.preventDefault(); changeLanguage('{{ $langCode }}');"
                                class="tw-flex tw-items-center tw-gap-3 tw-px-4 tw-py-2 tw-text-[13px] tw-transition-colors
                                {{ $currentLang === $langCode 
                                    ? 'tw-bg-gray-50 tw-font-bold tw-text-blue-600' 
                                    : 'tw-text-gray-600 hover:tw-bg-gray-50 hover:tw-text-gray-900' }}">
                                    
                                    <span class="fi fi-{{ $langData['flag_code'] }} tw-w-4 tw-rounded-[1px]"></span>
                                    <span class="tw-flex-1">{{ $langData['name'] }}</span>

                                    @if($currentLang === $langCode)
                                        <svg class="tw-w-3 tw-h-3 tw-text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </details>
                <details class="tw-dw-dropdown tw-relative tw-inline-block tw-text-left">
                    <summary data-toggle="popover"
                        class="user-profile-btn tw-cursor-pointer">
                        <span class="tw-hidden md:tw-block"></span>
                        <img src="{{ asset('img/icon/user-profile.png') }}" alt="" style="width: 32px; height: 32px;">
                    </summary>

                     <ul class="tw-p-2 tw-w-48 tw-absolute tw-right-0 tw-origin-top-right tw-z-10 tw-mt-2  tw-bg-white tw-rounded-lg tw-shadow-lg tw-ring-1 tw-ring-gray-200 focus:tw-outline-none"
                        role="menu" tabindex="-1">
                        <div class="tw-px-4 tw-pt-3 tw-pb-1" role="none">
                            <p class="tw-text-sm" role="none">
                                Signed in as
                            </p>
                            <p class="tw-text-sm tw-font-medium tw-text-gray-900 tw-truncate" role="none">
                                 {{ Auth::User()->first_name }} {{ Auth::User()->last_name }}
                            </p>
                        </div>

                        <li>
                            <a href="{{ action([\App\Http\Controllers\UserController::class, 'getProfile']) }}"
                                class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                role="menuitem" tabindex="-1">
                                <svg aria-hidden="true" class="tw-w-5 tw-h-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                    <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                                </svg>
                                Profile                            </a>
                        </li>
                        <li>
                            <a href="{{ action([\App\Http\Controllers\Auth\LoginController::class, 'logout']) }}"
                                class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                role="menuitem" tabindex="-1">
                                <svg aria-hidden="true" class="tw-w-5 tw-h-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                    <path d="M9 12h12l-3 -3" />
                                    <path d="M18 15l3 -3" />
                                </svg>
                                Sign Out           
                            </a>
                        </li>
                    </ul>
                </details>
            </div>
        </div>
    </div>
</div>
<style>
    /* Modern White Glassmorphism Header with 3D Effects */
    .modern-header {
        background: #ffffff;
        backdrop-filter: blur(30px) saturate(200%);
        -webkit-backdrop-filter: blur(30px) saturate(200%);
        height: 80px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.08);
        box-shadow: 
            0 4px 24px rgba(0, 0, 0, 0.06),
            0 1px 3px rgba(0, 0, 0, 0.04),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
        position: relative;
        z-index: 1000;
        overflow: visible;
    }

    .modern-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 10% 20%, rgba(99, 102, 241, 0.03) 0%, transparent 50%),
            radial-gradient(circle at 90% 80%, rgba(168, 85, 247, 0.03) 0%, transparent 50%);
        pointer-events: none;
        z-index: 0;
    }

    /* 3D Glassmorphism Button Style - Light Lemon Theme */
    .header-btn {
        background: rgba(254, 243, 199, 0.95);
        backdrop-filter: blur(20px) saturate(180%);
        -webkit-backdrop-filter: blur(20px) saturate(180%);
        border: 1px solid rgba(253, 230, 138, 0.4);
        border-radius: 16px;
        padding: 10px 14px;
        color: #78350f;
        font-weight: 600;
        font-size: 0.875rem;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        box-shadow: 
            0 4px 12px rgba(253, 224, 71, 0.3),
            0 2px 6px rgba(253, 224, 71, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.5),
            inset 0 -1px 0 rgba(217, 119, 6, 0.1);
        position: relative;
        overflow: hidden;
        transform-style: preserve-3d;
        perspective: 1000px;
        outline: none !important;
    }

    .header-btn:focus,
    .header-btn:active,
    .header-btn:focus-visible {
        outline: none !important;
        border: 1px solid rgba(253, 230, 138, 0.4) !important;
        box-shadow: 
            0 4px 12px rgba(253, 224, 71, 0.3),
            0 2px 6px rgba(253, 224, 71, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.5),
            inset 0 -1px 0 rgba(217, 119, 6, 0.1) !important;
    }

    .header-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, 
            rgba(255, 255, 255, 0.2) 0%, 
            rgba(255, 255, 255, 0.05) 50%,
            transparent 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
        pointer-events: none;
    }

    .header-btn::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s ease, height 0.6s ease;
    }

    .header-btn:hover {
        background: rgba(253, 230, 138, 1);
        border-color: rgba(250, 204, 21, 0.5);
        color: #78350f;
        transform: translateY(-6px) rotateX(5deg) scale(1.05);
        box-shadow: 
            0 20px 40px rgba(253, 224, 71, 0.5),
            0 10px 20px rgba(253, 224, 71, 0.4),
            0 0 0 1px rgba(250, 204, 21, 0.3),
            inset 0 2px 4px rgba(255, 255, 255, 0.6),
            inset 0 -2px 4px rgba(217, 119, 6, 0.15);
    }

    .header-btn:hover::before {
        opacity: 1;
    }

    .header-btn:hover::after {
        width: 300px;
        height: 300px;
    }

    .header-btn svg,
    .header-btn img {
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        z-index: 1;
    }

    .header-btn:hover svg,
    .header-btn:hover img {
        transform: scale(1.15) rotateZ(10deg) translateZ(10px);
        filter: drop-shadow(0 4px 8px rgba(120, 53, 15, 0.2));
    }

    .header-btn-icon {
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Multi-Color Button Variants - Matching Dashboard Colors */
    .header-btn-purple {
        background: rgba(139, 92, 246, 0.95) !important;
        border: 1px solid rgba(139, 92, 246, 0.3) !important;
        color: #ffffff !important;
        box-shadow: 
            0 4px 12px rgba(139, 92, 246, 0.3),
            0 2px 6px rgba(139, 92, 246, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.2),
            inset 0 -1px 0 rgba(0, 0, 0, 0.1) !important;
    }
    .header-btn-purple:hover {
        background: rgba(124, 58, 237, 1) !important;
        border-color: rgba(124, 58, 237, 0.5) !important;
        box-shadow: 
            0 20px 40px rgba(139, 92, 246, 0.5),
            0 10px 20px rgba(139, 92, 246, 0.4),
            0 0 0 1px rgba(124, 58, 237, 0.3),
            inset 0 2px 4px rgba(255, 255, 255, 0.3),
            inset 0 -2px 4px rgba(0, 0, 0, 0.1) !important;
    }

    .header-btn-green {
        background: rgba(34, 197, 94, 0.95) !important;
        border: 1px solid rgba(34, 197, 94, 0.3) !important;
        color: #ffffff !important;
        box-shadow: 
            0 4px 12px rgba(34, 197, 94, 0.3),
            0 2px 6px rgba(34, 197, 94, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.2),
            inset 0 -1px 0 rgba(0, 0, 0, 0.1) !important;
    }
    .header-btn-green:hover {
        background: rgba(22, 163, 74, 1) !important;
        border-color: rgba(22, 163, 74, 0.5) !important;
        box-shadow: 
            0 20px 40px rgba(34, 197, 94, 0.5),
            0 10px 20px rgba(34, 197, 94, 0.4),
            0 0 0 1px rgba(22, 163, 74, 0.3),
            inset 0 2px 4px rgba(255, 255, 255, 0.3),
            inset 0 -2px 4px rgba(0, 0, 0, 0.1) !important;
    }

    .header-btn-pink {
        background: rgba(236, 72, 153, 0.95) !important;
        border: 1px solid rgba(236, 72, 153, 0.3) !important;
        color: #ffffff !important;
        box-shadow: 
            0 4px 12px rgba(236, 72, 153, 0.3),
            0 2px 6px rgba(236, 72, 153, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.2),
            inset 0 -1px 0 rgba(0, 0, 0, 0.1) !important;
    }
    .header-btn-pink:hover {
        background: rgba(219, 39, 119, 1) !important;
        border-color: rgba(219, 39, 119, 0.5) !important;
        box-shadow: 
            0 20px 40px rgba(236, 72, 153, 0.5),
            0 10px 20px rgba(236, 72, 153, 0.4),
            0 0 0 1px rgba(219, 39, 119, 0.3),
            inset 0 2px 4px rgba(255, 255, 255, 0.3),
            inset 0 -2px 4px rgba(0, 0, 0, 0.1) !important;
    }

    .header-btn-orange {
        background: rgba(249, 115, 22, 0.95) !important;
        border: 1px solid rgba(249, 115, 22, 0.3) !important;
        color: #ffffff !important;
        box-shadow: 
            0 4px 12px rgba(249, 115, 22, 0.3),
            0 2px 6px rgba(249, 115, 22, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.2),
            inset 0 -1px 0 rgba(0, 0, 0, 0.1) !important;
    }
    .header-btn-orange:hover {
        background: rgba(234, 88, 12, 1) !important;
        border-color: rgba(234, 88, 12, 0.5) !important;
        box-shadow: 
            0 20px 40px rgba(249, 115, 22, 0.5),
            0 10px 20px rgba(249, 115, 22, 0.4),
            0 0 0 1px rgba(234, 88, 12, 0.3),
            inset 0 2px 4px rgba(255, 255, 255, 0.3),
            inset 0 -2px 4px rgba(0, 0, 0, 0.1) !important;
    }

    .header-btn-cyan {
        background: rgba(6, 182, 212, 0.95) !important;
        border: 1px solid rgba(6, 182, 212, 0.3) !important;
        color: #ffffff !important;
        box-shadow: 
            0 4px 12px rgba(6, 182, 212, 0.3),
            0 2px 6px rgba(6, 182, 212, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.2),
            inset 0 -1px 0 rgba(0, 0, 0, 0.1) !important;
    }
    .header-btn-cyan:hover {
        background: rgba(8, 145, 178, 1) !important;
        border-color: rgba(8, 145, 178, 0.5) !important;
        box-shadow: 
            0 20px 40px rgba(6, 182, 212, 0.5),
            0 10px 20px rgba(6, 182, 212, 0.4),
            0 0 0 1px rgba(8, 145, 178, 0.3),
            inset 0 2px 4px rgba(255, 255, 255, 0.3),
            inset 0 -2px 4px rgba(0, 0, 0, 0.1) !important;
    }

    .header-btn-red {
        background: rgba(239, 68, 68, 0.95) !important;
        border: 1px solid rgba(239, 68, 68, 0.3) !important;
        color: #ffffff !important;
        box-shadow: 
            0 4px 12px rgba(239, 68, 68, 0.3),
            0 2px 6px rgba(239, 68, 68, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.2),
            inset 0 -1px 0 rgba(0, 0, 0, 0.1) !important;
    }
    .header-btn-red:hover {
        background: rgba(220, 38, 38, 1) !important;
        border-color: rgba(220, 38, 38, 0.5) !important;
        box-shadow: 
            0 20px 40px rgba(239, 68, 68, 0.5),
            0 10px 20px rgba(239, 68, 68, 0.4),
            0 0 0 1px rgba(220, 38, 38, 0.3),
            inset 0 2px 4px rgba(255, 255, 255, 0.3),
            inset 0 -2px 4px rgba(0, 0, 0, 0.1) !important;
    }

    .header-btn-blue {
        background: rgba(59, 130, 246, 0.95) !important;
        border: 1px solid rgba(59, 130, 246, 0.3) !important;
        color: #ffffff !important;
        box-shadow: 
            0 4px 12px rgba(59, 130, 246, 0.3),
            0 2px 6px rgba(59, 130, 246, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.2),
            inset 0 -1px 0 rgba(0, 0, 0, 0.1) !important;
    }
    .header-btn-blue:hover {
        background: rgba(37, 99, 235, 1) !important;
        border-color: rgba(37, 99, 235, 0.5) !important;
        box-shadow: 
            0 20px 40px rgba(59, 130, 246, 0.5),
            0 10px 20px rgba(59, 130, 246, 0.4),
            0 0 0 1px rgba(37, 99, 235, 0.3),
            inset 0 2px 4px rgba(255, 255, 255, 0.3),
            inset 0 -2px 4px rgba(0, 0, 0, 0.1) !important;
    }

    .pos-button {
        background: rgba(249, 115, 22, 0.95);
        backdrop-filter: blur(20px) saturate(180%);
        -webkit-backdrop-filter: blur(20px) saturate(180%);
        border: 1px solid rgba(249, 115, 22, 0.4);
        border-radius: 18px;
        padding: 12px 20px;
        color: #ffffff;
        font-weight: 700;
        font-size: 0.875rem;
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        display: inline-flex;
        align-items: center;
        gap: 10px;
        box-shadow: 
            0 6px 20px rgba(249, 115, 22, 0.4),
            0 3px 10px rgba(249, 115, 22, 0.3),
            inset 0 2px 4px rgba(255, 255, 255, 0.2),
            inset 0 -2px 4px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
        transform-style: preserve-3d;
        perspective: 1000px;
        outline: none !important;
    }

    .pos-button:focus,
    .pos-button:active,
    .pos-button:focus-visible {
        outline: none !important;
        border: 1px solid rgba(249, 115, 22, 0.4) !important;
    }

    .pos-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, 
            rgba(255, 255, 255, 0.4) 0%, 
            rgba(255, 255, 255, 0.1) 50%,
            transparent 100%);
        opacity: 0;
        transition: opacity 0.5s ease;
        pointer-events: none;
    }

    .pos-button::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.4);
        transform: translate(-50%, -50%);
        transition: width 0.8s ease, height 0.8s ease;
    }

    .pos-button:hover {
        background: rgba(234, 88, 12, 1);
        border-color: rgba(234, 88, 12, 0.6);
        color: #ffffff;
        transform: translateY(-8px) rotateX(8deg) scale(1.08);
        box-shadow: 
            0 25px 50px rgba(249, 115, 22, 0.5),
            0 12px 24px rgba(249, 115, 22, 0.4),
            0 0 0 2px rgba(234, 88, 12, 0.4),
            inset 0 3px 6px rgba(255, 255, 255, 0.3),
            inset 0 -3px 6px rgba(0, 0, 0, 0.2);
    }

    .pos-button:hover::before {
        opacity: 1;
    }

    .pos-button:hover::after {
        width: 400px;
        height: 400px;
    }

    .pos-button svg {
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        z-index: 1;
        filter: drop-shadow(0 2px 4px rgba(255, 255, 255, 0.3));
    }

    .pos-button:hover svg {
        transform: rotateZ(15deg) scale(1.2) translateZ(15px);
        filter: drop-shadow(0 6px 12px rgba(255, 255, 255, 0.4));
    }

    .date-button {
        background: rgba(59, 130, 246, 0.95);
        backdrop-filter: blur(20px) saturate(180%);
        -webkit-backdrop-filter: blur(20px) saturate(180%);
        border: 1px solid rgba(59, 130, 246, 0.3);
        border-radius: 16px;
        padding: 10px 16px;
        color: #ffffff;
        font-weight: 700;
        font-size: 0.875rem;
        font-family: 'Courier New', monospace;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 
            0 4px 12px rgba(59, 130, 246, 0.3),
            0 2px 6px rgba(59, 130, 246, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.2),
            inset 0 -1px 0 rgba(0, 0, 0, 0.1);
        transform-style: preserve-3d;
        perspective: 1000px;
        outline: none !important;
    }

    .date-button:focus,
    .date-button:active,
    .date-button:focus-visible {
        outline: none !important;
        border: 1px solid rgba(59, 130, 246, 0.3) !important;
    }

    .date-button:hover {
        background: rgba(37, 99, 235, 1);
        border-color: rgba(37, 99, 235, 0.5);
        color: #ffffff;
        transform: translateY(-6px) rotateX(5deg) scale(1.05);
        box-shadow: 
            0 20px 40px rgba(59, 130, 246, 0.5),
            0 10px 20px rgba(59, 130, 246, 0.4),
            0 0 0 1px rgba(37, 99, 235, 0.3),
            inset 0 2px 4px rgba(255, 255, 255, 0.3),
            inset 0 -2px 4px rgba(0, 0, 0, 0.1);
    }

    .user-profile-btn {
        background: rgba(236, 72, 153, 0.95);
        backdrop-filter: blur(20px) saturate(180%);
        -webkit-backdrop-filter: blur(20px) saturate(180%);
        border: 1px solid rgba(236, 72, 153, 0.3);
        border-radius: 16px;
        padding: 8px 12px;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 
            0 4px 12px rgba(236, 72, 153, 0.3),
            0 2px 6px rgba(236, 72, 153, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.2),
            inset 0 -1px 0 rgba(0, 0, 0, 0.1);
        transform-style: preserve-3d;
        perspective: 1000px;
        outline: none !important;
    }

    .user-profile-btn:focus,
    .user-profile-btn:active,
    .user-profile-btn:focus-visible {
        outline: none !important;
        border: 1px solid rgba(236, 72, 153, 0.3) !important;
    }

    .user-profile-btn:hover {
        background: rgba(219, 39, 119, 1);
        border-color: rgba(219, 39, 119, 0.5);
        transform: translateY(-6px) rotateX(5deg) scale(1.05);
        box-shadow: 
            0 20px 40px rgba(236, 72, 153, 0.5),
            0 10px 20px rgba(236, 72, 153, 0.4),
            0 0 0 1px rgba(219, 39, 119, 0.3),
            inset 0 2px 4px rgba(255, 255, 255, 0.3),
            inset 0 -2px 4px rgba(0, 0, 0, 0.1);
    }

    .user-profile-btn img {
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        border-radius: 50%;
        border: 2px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 2px 8px rgba(236, 72, 153, 0.3);
        position: relative;
        z-index: 1;
    }

    .user-profile-btn:hover img {
        transform: scale(1.2) rotateZ(10deg) translateZ(10px);
        border-color: rgba(255, 255, 255, 0.5);
        box-shadow: 0 6px 20px rgba(219, 39, 119, 0.5);
    }

    .notification-btn {
        position: relative;
        background: rgba(239, 68, 68, 0.95);
        backdrop-filter: blur(20px) saturate(180%);
        -webkit-backdrop-filter: blur(20px) saturate(180%);
        border: 1px solid rgba(239, 68, 68, 0.3);
        border-radius: 16px;
        padding: 10px 14px;
        color: #ffffff;
        box-shadow: 
            0 4px 12px rgba(239, 68, 68, 0.3),
            0 2px 6px rgba(239, 68, 68, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.2),
            inset 0 -1px 0 rgba(0, 0, 0, 0.1);
    }

    .notification-btn:hover {
        background: rgba(220, 38, 38, 1);
        border-color: rgba(220, 38, 38, 0.5);
        transform: translateY(-6px) rotateX(5deg) scale(1.05);
        box-shadow: 
            0 20px 40px rgba(239, 68, 68, 0.5),
            0 10px 20px rgba(239, 68, 68, 0.4),
            0 0 0 1px rgba(220, 38, 38, 0.3),
            inset 0 2px 4px rgba(255, 255, 255, 0.3),
            inset 0 -2px 4px rgba(0, 0, 0, 0.1);
    }

    .notification-badge {
        position: absolute;
        top: -8px;
        right: -8px;
        background: #ef4444;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        color: white;
        border-radius: 14px;
        padding: 4px 9px;
        font-size: 0.7rem;
        font-weight: 700;
        min-width: 22px;
        text-align: center;
        box-shadow: 
            0 6px 16px rgba(239, 68, 68, 0.5),
            0 3px 8px rgba(239, 68, 68, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.3),
            inset 0 -1px 0 rgba(0, 0, 0, 0.2);
        animation: pulse-badge 2s ease-in-out infinite;
        border: 2px solid rgba(255, 255, 255, 0.4);
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        transform-style: preserve-3d;
        z-index: 10;
    }

    @keyframes pulse-badge {
        0%, 100% {
            transform: scale(1) translateZ(0);
            box-shadow: 
                0 6px 16px rgba(239, 68, 68, 0.5),
                0 3px 8px rgba(239, 68, 68, 0.4);
        }
        50% {
            transform: scale(1.2) translateZ(5px);
            box-shadow: 
                0 10px 24px rgba(239, 68, 68, 0.7),
                0 5px 12px rgba(239, 68, 68, 0.6),
                0 0 25px rgba(239, 68, 68, 0.5);
        }
    }

    @media (max-width: 768px) {
        .modern-header {
            height: 70px;
        }

        .header-btn {
            padding: 8px 12px;
            font-size: 0.8125rem;
        }

        .pos-button {
            padding: 10px 16px;
            font-size: 0.8125rem;
        }
    }
</style>
