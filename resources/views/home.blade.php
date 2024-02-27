@extends('guest.layout.master')

@section('contents')
<div>
    <body class="bgImage backdrop-brightness-50">
        <div class="min-h-[80%] flex flex-col justify-center items-center">
            <h1
                class="mt-20 mb-8 text-4xl text-center font-extrabold leading-normal tracking-wide text-white md:text-5xl lg:text-6xl dark:text-white">
                <span class="text-transparent bg-clip-text bg-gradient-to-r to-blue-500 from-cyan-500">Material Item
                </span>Section
            </h1>

            <p class="mb-20 text-me font-normal text-white text-center lg:text-xl sm:px-16 xl:px-48 ">
                Select
                the below option's for available services.</p>

            <div class="">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mx-5 lg:mx-28">
                    <a class="group relative inline-flex border rounded-lg border-blue-500 focus:outline-none w-full sm:w-auto"
                        href="/material-search">
                        <span
                            class="w-full inline-flex items-center rounded-lg justify-center self-stretch px-4 py-2 text-sm text-white text-center font-bold uppercase bg-blue-500 ring-1 ring-blue-500 ring-offset-1 ring-offset-blue-500 transform transition-transform group-hover:-translate-y-1 group-hover:-translate-x-1 group-focus:-translate-y-1 group-focus:-translate-x-1">
                            Material Items
                        </span>
                    </a>
                    <a class="group relative inline-flex border rounded-lg border-cyan-500 focus:outline-none w-full sm:w-auto"
                        href="/service-search">
                        <span
                            class="w-full inline-flex items-center rounded-lg justify-center self-stretch px-4 py-2 text-sm text-white text-center font-bold uppercase bg-cyan-500 ring-1 ring-cyan-500 ring-offset-1 ring-offset-cyan-500 transform transition-transform group-hover:-translate-y-1 group-hover:-translate-x-1 group-focus:-translate-y-1 group-focus:-translate-x-1">
                            Service Items
                        </span>
                    </a>
                    <a class="group relative inline-flex border rounded-lg border-blue-500 focus:outline-none w-full sm:w-auto"
                        href="https://script.google.com/macros/s/AKfycbxDFSmzn_U39gN-QYBRKKsZkuKaMKpEm4sx4np9fzr37Zneldl7g_tJCo6BQX2cajQ/exec" target="_blank">
                        <span
                            class="w-full inline-flex items-center rounded-lg justify-center self-stretch px-4 py-2 text-sm text-white text-center font-bold uppercase bg-blue-500 ring-1 ring-blue-500 ring-offset-1 ring-offset-blue-500 transform transition-transform group-hover:-translate-y-1 group-hover:-translate-x-1 group-focus:-translate-y-1 group-focus:-translate-x-1">
                            Material Creation Request
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <footer class="sticky-footer" id="footer">
            <div class="copyright text-center text-sm text-white opacity-50">
              <span>Copyright ©<a class="" href="https://zuse.lk/">Zuse Technologies</a> 2023</span>
            </div>
        </footer>
    </body>
</div>
<div class="loading-page" style="font-family: Michroma, sans-serif;">
    {{-- <svg id="svg" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-letter-m" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <path d="M6 20v-16l6 14l6 -14v16" /> </svg> --}}

    <svg id="svg"  version="1.0" id="katman_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    viewBox="0 0 1190.55 841.89" style="enable-background:new 0 0 1190.55 841.89;" xml:space="preserve">
    <line x1="846.54" y1="451.96" x2="846.37" y2="451.54"/>
    <polygon points="661.09,565.46 650.73,591.1 647.66,598.69 627.92,647.59 608.15,696.53 601.83,712.13 596.48,725.38 584.82,696.53
        565.05,647.59 552.9,617.53 545.27,598.69 531.64,564.91 525.53,549.79 505.76,500.86 504,496.51 485.98,451.96 480.19,437.53
        474.35,451.96 455.1,499.61 454.61,500.86 434.84,549.79 303.94,549.79 308.36,538.82 323.72,500.86 343.46,451.96 357.26,417.79
        363.23,403.06 382.97,354.12 402.74,305.22 406.16,296.76 414.72,275.58 422.48,256.32 442.26,207.38 455.1,175.63 462.03,158.48
        479.36,115.62 496.68,158.48 504,176.6 516.42,207.38 536.19,256.32 544.79,277.61 552.9,297.66 555.97,305.22 575.71,354.12
        595.48,403.06 596.28,404.99 601.83,418.76 615.26,451.96 635,500.86 650.73,539.82 654.77,549.79 "/>
    <polygon points="886.06,549.79 761.44,549.79 748.57,517.94 741.67,500.86 721.89,451.96 714.44,433.46 702.15,403.06
        699.63,396.84 682.38,354.12 662.61,305.22 650.73,275.78 650.73,270.16 656.32,256.32 676.1,207.38 695.84,158.48 699.63,149.13
        711.92,118.73 727.97,158.48 747.74,207.38 748.57,209.45 767.48,256.32 776.73,279.2 787.26,305.22 797.47,330.52 806.99,354.12
        826.77,403.06 846.37,451.54 846.37,451.96 846.54,451.96 866.28,500.86 "/>
    </svg>

    <div class="name-container">
        <div class="logo-name">M I S</div>
    </div>
</div>
@endsection

