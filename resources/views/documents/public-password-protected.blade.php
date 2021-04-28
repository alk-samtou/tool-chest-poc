<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="antialiased">
    <div class="min-h-screen bg-gray-800 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="w-auto mx-auto">
            <svg class="text-gray-100" height="50" viewBox="0 0 256 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0)">
                    <path d="M20.5 17.6043C16.3354 17.6043 12.9606 21.0145 12.9606 25.2229C12.9606 29.4312 16.3354 32.8414 20.5 32.8414C24.6646 32.8414 28.0394 29.4312 28.0394 25.2229C28.0394 21.0236 24.6646 17.6134 20.5 17.6043ZM24.0184 23.1912L19.6743 30.8461C19.5486 31.0638 19.2793 31.1363 19.0639 31.0093C18.9203 30.9277 18.8306 30.7644 18.8395 30.5921L19.0191 26.6105H18.0946C17.8433 26.6105 17.6458 26.411 17.6458 26.157C17.6458 26.1298 17.6458 26.1117 17.6548 26.0845L18.5972 20.2527C18.6331 20.035 18.8216 19.8717 19.037 19.8717H22.4836C22.7349 19.8717 22.9324 20.0713 22.9324 20.3252C22.9324 20.3706 22.9234 20.425 22.9054 20.4703L22.2053 22.6017L23.5965 22.5019C23.8479 22.4838 24.0543 22.6743 24.0722 22.9192C24.0812 23.028 24.0633 23.1187 24.0184 23.1912Z" fill="white"/>
                    <path d="M21.2091 23.3908C21.1193 23.2729 21.0924 23.1096 21.1373 22.9736L21.8553 20.7968H19.414L18.6151 25.7217H19.4858C19.7371 25.7217 19.9345 25.9212 19.9345 26.1752C19.9345 26.1842 19.9345 26.1933 19.9345 26.1933L19.8179 28.7691L22.8157 23.4815L21.595 23.5722C21.4514 23.5812 21.3078 23.5178 21.2091 23.3908Z" fill="white"/>
                    <path d="M13.1581 4.93392C13.1581 3.25603 14.5133 1.8865 16.1738 1.8865H23.8389C25.4993 1.8865 26.8546 3.25603 26.8546 4.93392V6.11298H28.7215V4.93392C28.7215 2.21301 26.5315 0.00906971 23.8389 0H16.1738C13.4812 0 11.3001 2.21301 11.2912 4.93392V6.11298H13.1581V4.93392V4.93392Z" fill="white"/>
                    <path d="M33.5952 17.3141V14.2485H29.7358V17.3141L31.6655 18.7562L33.5952 17.3141Z" fill="white"/>
                    <path d="M10.2769 17.3231V14.2576H6.41747V17.3231L8.34719 18.8378L10.2769 17.3231Z" fill="white"/>
                    <path d="M39.8422 10.5571C39.8422 8.60716 38.2715 7.01996 36.3417 7.01996H4.65828C2.72855 7.01996 1.15784 8.60716 1.15784 10.5571V10.9834H39.8332V10.5571H39.8422Z" fill="white"/>
                    <path d="M34.4928 17.5408C34.4928 17.6859 34.421 17.822 34.3133 17.9036L31.9348 19.6813C31.7732 19.7992 31.5578 19.7992 31.4052 19.6813L29.0267 17.9036C28.91 17.822 28.8472 17.6859 28.8472 17.5408V15.6815H11.1745V17.5408C11.1745 17.6769 11.1116 17.8129 11.0039 17.8945L8.62544 19.772C8.46388 19.8989 8.23949 19.8989 8.07793 19.772L5.69943 17.9036C5.59172 17.822 5.5289 17.6859 5.5289 17.5499V15.6906H1.15784V31.4719C1.15784 33.4219 2.72855 35.0091 4.65827 35.0091H36.3328C38.2625 35.0091 39.8332 33.4219 39.8332 31.4719V15.6815H34.4838L34.4928 17.5408ZM3.71585 31.8982C3.71585 32.1521 3.51839 32.3516 3.26708 32.3516C3.01576 32.3516 2.8183 32.1521 2.8183 31.8982V23.1822C2.8183 22.9282 3.01576 22.7287 3.26708 22.7287C3.51839 22.7287 3.71585 22.9282 3.71585 23.1822V31.8982ZM3.71585 21.5859C3.71585 21.8398 3.51839 22.0394 3.26708 22.0394C3.01576 22.0394 2.8183 21.8398 2.8183 21.5859V20.951C2.8183 20.6971 3.01576 20.4975 3.26708 20.4975C3.51839 20.4975 3.71585 20.6971 3.71585 20.951V21.5859ZM20.5 33.7574C15.8417 33.7574 12.063 29.9391 12.063 25.2319C12.063 20.5247 15.8417 16.7064 20.5 16.7064C25.1583 16.7064 28.937 20.5247 28.937 25.2319C28.937 29.9391 25.1583 33.7484 20.5 33.7574Z" fill="white"/>
                    <path d="M0 14.7746H5.51992V13.8041C5.51992 13.5501 5.71738 13.3506 5.9687 13.3506H10.7257C10.977 13.3506 11.1745 13.5501 11.1745 13.8041V14.7746H28.8382V13.8041C28.8382 13.5501 29.0357 13.3506 29.287 13.3506H34.044C34.2953 13.3506 34.4928 13.5501 34.4928 13.8041V14.7746H41V11.8813H0V14.7746Z" fill="white"/>
                </g>
                <path d="M78.816 15.585H74.538L72.027 30H66.137L68.648 15.585H64.401L65.3 10.625H79.715L78.816 15.585ZM65.176 29.907L52.032 28.512H65.424L65.176 29.907ZM66.23 23.924L53.086 22.529H66.478L66.23 23.924ZM66.757 20.948L53.613 19.553H67.005L66.757 20.948ZM67.284 17.972L54.14 16.577H67.532L67.284 17.972ZM65.703 26.9L52.559 25.505H65.951L65.703 26.9ZM63.564 14.996L50.42 13.601H63.781L63.564 14.996ZM64.06 12.02L50.947 10.625H64.308L64.06 12.02Z" fill="white"/>
                <path d="M92.7585 13.291C94.9905 13.291 96.5818 13.725 97.5325 14.593C98.4832 15.4403 98.9585 16.7733 98.9585 18.592C98.9585 19.4807 98.8448 20.5553 98.6175 21.816C98.1008 24.792 97.1915 26.962 95.8895 28.326C94.5875 29.69 92.5415 30.372 89.7515 30.372C87.5608 30.372 86.0005 29.9483 85.0705 29.101C84.1405 28.233 83.6755 26.9 83.6755 25.102C83.6755 24.172 83.7892 23.0767 84.0165 21.816C84.5332 18.84 85.4322 16.6803 86.7135 15.337C87.9948 13.973 90.0098 13.291 92.7585 13.291ZM90.6505 25.66C91.2498 25.66 91.6942 25.5877 91.9835 25.443C92.2935 25.2983 92.5002 24.978 92.6035 24.482L93.7815 18.003H91.8905C91.3118 18.003 90.8572 18.0753 90.5265 18.22C90.2165 18.3647 90.0305 18.6747 89.9685 19.15L88.8215 25.66H90.6505ZM82.9315 22.529C82.8488 23.1697 82.7972 23.6037 82.7765 23.831L70.5625 22.529H82.9315ZM83.5205 19.553L83.2415 20.855L71.1205 19.553H83.5205ZM82.7455 25.505C82.7455 25.8357 82.7868 26.2697 82.8695 26.807L70.6865 25.505H82.7455ZM84.6055 16.577C84.3575 17.1143 84.1818 17.5277 84.0785 17.817L72.3605 16.577H84.6055ZM83.3965 28.512C83.6445 29.008 83.9132 29.3903 84.2025 29.659L73.3835 28.512H83.3965ZM87.3025 13.601C86.8065 13.8903 86.3828 14.2313 86.0315 14.624L76.5145 13.601H87.3025Z" fill="white"/>
                <path d="M116.281 13.291C118.513 13.291 120.104 13.725 121.055 14.593C122.006 15.4403 122.481 16.7733 122.481 18.592C122.481 19.4807 122.367 20.5553 122.14 21.816C121.623 24.792 120.714 26.962 119.412 28.326C118.11 29.69 116.064 30.372 113.274 30.372C111.083 30.372 109.523 29.9483 108.593 29.101C107.663 28.233 107.198 26.9 107.198 25.102C107.198 24.172 107.312 23.0767 107.539 21.816C108.056 18.84 108.955 16.6803 110.236 15.337C111.517 13.973 113.532 13.291 116.281 13.291ZM114.173 25.66C114.772 25.66 115.217 25.5877 115.506 25.443C115.816 25.2983 116.023 24.978 116.126 24.482L117.304 18.003H115.413C114.834 18.003 114.38 18.0753 114.049 18.22C113.739 18.3647 113.553 18.6747 113.491 19.15L112.344 25.66H114.173ZM106.454 22.529C106.371 23.1697 106.32 23.6037 106.299 23.831L94.085 22.529H106.454ZM107.043 19.553L106.764 20.855L94.643 19.553H107.043ZM106.268 25.505C106.268 25.8357 106.309 26.2697 106.392 26.807L94.209 25.505H106.268ZM108.128 16.577C107.88 17.1143 107.704 17.5277 107.601 17.817L95.883 16.577H108.128ZM106.919 28.512C107.167 29.008 107.436 29.3903 107.725 29.659L96.906 28.512H106.919ZM110.825 13.601C110.329 13.8903 109.905 14.2313 109.554 14.624L100.037 13.601H110.825Z" fill="white"/>
                <path d="M140.423 30H130.348L133.2 13.601H138.656L136.579 25.443H141.229L140.423 30ZM129.325 29.907L116.181 28.512H129.573L129.325 29.907ZM130.379 23.924L117.235 22.529H130.627L130.379 23.924ZM130.906 20.948L117.762 19.553H131.154L130.906 20.948ZM131.433 17.972L118.289 16.577H131.681L131.433 17.972ZM131.96 14.996L118.816 13.601H132.177L131.96 14.996ZM129.852 26.9L116.708 25.505H130.1L129.852 26.9Z" fill="white"/>
                <path d="M153.771 20.173C153.73 20.3383 153.689 20.5657 153.647 20.855L141.464 19.553H153.864L153.771 20.173ZM153.43 22.529C153.368 23.0043 153.337 23.4383 153.337 23.831L141.123 22.529H153.43ZM154.608 16.577L154.236 17.848L142.208 16.577H154.608ZM153.368 25.505C153.451 26.0837 153.523 26.5177 153.585 26.807L141.526 25.505H153.368ZM155.879 13.601C155.59 14.1383 155.383 14.5517 155.259 14.841L143.665 13.601H155.879ZM154.298 28.512C154.567 28.9873 154.877 29.3697 155.228 29.659L144.502 28.512H154.298ZM158.824 10.625C158.225 10.997 157.76 11.338 157.429 11.648L147.943 10.625H158.824ZM161.552 30.465C158.948 30.465 157.078 29.9587 155.941 28.946C154.825 27.9333 154.267 26.373 154.267 24.265C154.267 23.3763 154.412 22.064 154.701 20.328C155.321 16.7733 156.386 14.19 157.894 12.578C159.424 10.966 161.831 10.16 165.117 10.16C165.882 10.16 166.75 10.2427 167.721 10.408C168.713 10.5527 169.437 10.7387 169.891 10.966L168.155 15.709C166.936 15.4197 165.789 15.275 164.714 15.275C163.66 15.275 162.906 15.3783 162.451 15.585C161.997 15.7917 161.718 16.205 161.614 16.825L160.188 24.947C160.932 25.1123 161.697 25.195 162.482 25.195C164.156 25.195 165.686 24.947 167.07 24.451L166.574 29.659C165.252 30.1963 163.578 30.465 161.552 30.465Z" fill="white"/>
                <path d="M184.015 30L184.976 24.327H181.504L180.512 30H175.304L178.156 13.601H183.395L182.372 19.274H185.875L186.867 13.601H192.106L189.223 30H184.015ZM174.281 29.907L161.137 28.512H174.529L174.281 29.907ZM175.335 23.924L162.191 22.529H175.583L175.335 23.924ZM175.862 20.948L162.718 19.553H176.11L175.862 20.948ZM176.389 17.972L163.245 16.577H176.637L176.389 17.972ZM176.916 14.996L163.772 13.601H177.133L176.916 14.996ZM174.808 26.9L161.664 25.505H175.056L174.808 26.9Z" fill="white"/>
                <path d="M210.256 23.335H205.637L205.265 25.443H211L210.194 30H199.251L202.103 13.601H213.015L211.558 18.251H206.505L206.133 20.359H210.783L210.256 23.335ZM198.228 29.907L185.084 28.512H198.476L198.228 29.907ZM199.282 23.924L186.138 22.529H199.53L199.282 23.924ZM199.809 20.948L186.665 19.553H200.057L199.809 20.948ZM200.336 17.972L187.192 16.577H200.584L200.336 17.972ZM200.863 14.996L187.719 13.601H201.08L200.863 14.996ZM198.755 26.9L185.611 25.505H199.003L198.755 26.9Z" fill="white"/>
                <path d="M205.893 28.512H219.285L218.851 29.907L205.893 28.512ZM221.641 16.577C221.517 16.9077 221.382 17.3727 221.238 17.972L208.28 16.577H221.641ZM220.866 20.7V20.948L207.722 19.553H220.928C220.886 20.049 220.866 20.4313 220.866 20.7ZM219.843 26.869L206.916 25.505H220.277L219.843 26.869ZM223.78 13.601C223.222 14.0143 222.798 14.4483 222.509 14.903L210.419 13.601H223.78ZM221.145 22.529C221.331 23.0663 221.63 23.5313 222.044 23.924L208.931 22.529H221.145ZM233.514 18.468C232.108 18.1373 230.91 17.972 229.918 17.972C228.926 17.972 228.192 18.003 227.717 18.065L227.562 18.964L229.112 19.15C232.439 19.584 234.103 20.9583 234.103 23.273C234.103 23.5417 234.041 24.048 233.917 24.792C233.793 25.5153 233.586 26.218 233.297 26.9C233.007 27.582 232.635 28.14 232.181 28.574C231.747 28.9873 231.313 29.3283 230.879 29.597C230.465 29.845 229.928 30.0207 229.267 30.124C228.233 30.2893 226.849 30.372 225.113 30.372C223.397 30.372 221.661 30.1343 219.905 29.659L221.424 25.071C223.036 25.5257 224.441 25.753 225.64 25.753C226.859 25.753 227.717 25.722 228.213 25.66L228.368 24.668L226.415 24.451C224.741 24.265 223.552 23.8723 222.85 23.273C222.147 22.6737 221.796 21.816 221.796 20.7C221.796 20.2867 221.847 19.77 221.951 19.15C222.364 16.9387 223.108 15.4093 224.183 14.562C225.257 13.7147 226.89 13.291 229.081 13.291C231.292 13.291 233.266 13.508 235.002 13.942L233.514 18.468Z" fill="white"/>
                <path d="M254.958 18.251H251.61L249.564 30H244.108L246.154 18.251H242.713L243.55 13.601H255.795L254.958 18.251ZM243.178 29.907L230.034 28.512H243.426L243.178 29.907ZM244.232 23.924L231.088 22.529H244.48L244.232 23.924ZM244.759 20.948L231.615 19.553H245.007L244.759 20.948ZM241.783 17.972L228.639 16.577H242.031L241.783 17.972ZM242.31 14.996L229.166 13.601H242.527L242.31 14.996ZM243.705 26.9L230.561 25.505H243.953L243.705 26.9Z" fill="white"/>
                <defs>
                    <clipPath id="clip0">
                        <rect width="41" height="35" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
        </div>



        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-gray-600 py-8 px-4 shadow sm:rounded-lg sm:px-10">


                @if ($errors->any())

                        <div class="rounded-md bg-red-100 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <!-- Heroicon name: solid/x-circle -->
                                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">
                                        Validation Error!
                                    </h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <ul class=" space-y-1">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                @endif


                <form class="space-y-6" action="{{route('passwordDownload',['id'=>$document->id])}}" method="POST">
                    {{csrf_field()}}
                    <div class="block font-bold text-gray-100">
                        {{$document->title}}
                    </div>

                    <div class="block text-sm text-gray-100 mb-12">
                        {{$document->description}}
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-100">
                            Document Password <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none bg-gray-700 block w-full px-3 py-2 border border-gray-700 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Download
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    </body>
</html>