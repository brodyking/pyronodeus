
    <script>
        window.addEventListener('load', function() {
            // Download engine
            fetch('cookieClicker/wickengine.js')
                .then(resp => resp.text())
                .then(text => {
                    // Inject engine
                    var script = document.createElement('script');
                    script.type = 'text/javascript';
                    script.text = text;
                    document.getElementsByTagName('head')[0].appendChild(script);

                    // Download project
                    fetch('cookieClicker/project.wick')
                        .then(resp => resp.blob())
                        .then(blob => {
                            // Hide preloader
                            document.getElementById('preloader').style.display = 'none';
                            document.getElementById('preloader').remove();
                            // Run project
                            Wick.WickFile.fromWickFile(blob, project => {
                                project.inject(document.getElementById('wick-canvas-container'));
                            });
                        })
                        .catch((e) => {
                            console.error('Could not download Wick project.')
                            console.error(e);
                        });
                })
                .catch((e) => {
                    console.error('Could not download Wick project.')
                    console.error(e);
                });
        }, false);
    </script>

    <style>
        body, html {
            margin: 0px;
            width: 100%;
            height: 100%;
            background-color: black;
        }

        #wick-canvas-container {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        #preloader {
            position: absolute;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            margin: 0px;
            background-color: #1EE29A;
            font-family: sans-serif;
            transform-origin: 50% 50%;
        }

        /* Make Flashy slightly larger if the resolution of the screen is big enough */
		
        @media (min-width: 1200px) {
            #preloader {
                transform: scale(1.5, 1.5);
            }
        }
        @media (min-height: 1200px) {
            #preloader {
                transform: scale(2.0, 2.0);
            }
        }

        #loading-bar {
            text-align: center;
            vertical-align: center;
        }

        .animated {
            animation-iteration-count: infinite;
        }

        .flashy {
            position: absolute;
            top: 0%;
            left: 50%;
            margin-left: -50px;
            margin-top: -50px;
            width: 100px;
            height: 100px;
            animation: float .6s ease-in-out infinite alternate;
        }

        .shadow {
            position: absolute;
            top: calc(50% + 70px);
            left: 50%;
            margin-left: -45px;
            margin-top: -22.5px;
            width: 90px;
            height: 45px;
            animation: pulse .6s ease-in-out infinite alternate;
        }

        .text {
            position: absolute;
            top: calc(50% + 100px);
            left: 50%;
            margin-left: -100px;
            width: 200px;
            height: 30px;
            animation: pulse 1.2s ease-in-out infinite alternate;
            color: white;
            font-size: 20px;
        }

        @keyframes float {
            0% {top: 48%;}
            100% {top:50%;}
        }

        @keyframes pulse {
            0% {transform: scale3d(.9, .9, .9);}
            100% { transform: scale3d(1, 1, 1); }
        }
    </style>

    <!-- Preloader -->
    <div id="preloader">
      <div class="flashy">
        <svg viewBox="0 0 399 405" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Style-Guide" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Artboard-Copy-4" transform="translate(-1043.000000, -286.000000)">
                    <g id="Page-1-Copy-14" transform="translate(1050.000000, 296.000000)">
                        <path d="M305.129796,382.759914 C306.418105,384.08742 308.603283,383.908779 309.646405,382.384447 C320.26904,366.864077 372.357375,285.798514 380.623846,215.509175 C387.415966,157.758934 367.947229,106.895463 346.778311,80.3164676 C329.751769,58.9383847 289.498026,1.47054634 178.520632,5.17066086 C64.4783966,8.97453692 -21.3780458,118.906127 4.69784554,231.425337 C24.5849067,317.237186 63.7557391,369.482718 73.4793538,381.475197 C74.6224861,382.886139 76.7624987,382.923579 77.9594001,381.557564 L116.555978,337.503844 C117.816327,336.065089 120.104742,336.203081 121.182276,337.783038 L152.503887,383.72372 C153.60723,385.341116 155.968771,385.438459 157.202236,383.917336 L192.43394,340.460513 C193.651274,338.958645 195.974101,339.029246 197.095726,340.602784 L227.758127,383.584658 C228.934596,385.232006 231.399374,385.21596 232.552185,383.552566 L265.070697,336.641661 C266.120271,335.128026 268.298997,334.949385 269.583005,336.271542 L305.129796,382.759914 Z" id="Fill-1" fill="#FEFEFE"></path>
                        <path d="M304.85935,382.757352 C306.146689,384.086376 308.330222,383.907531 309.372559,382.381456 C315.299665,373.705126 332.195577,342.832902 349.08964,306.534876 C362.450536,277.828098 376.501967,246.372815 380.296559,215.31533 C394.60335,98.2189578 317.519792,-2.28838132e-12 196.906621,0 C76.2934496,2.28838132e-12 -10.1657681,94.7402574 4.65360011,215.31533 C8.76059591,248.731148 21.771743,280.724662 33.3037656,306.534876 C51.9757611,348.325309 71.3947754,376.061869 77.4013468,383.484047 C78.5436184,384.896603 80.6820197,384.934086 81.87802,383.566508 L116.427513,337.449523 C117.686913,336.009123 119.973605,336.147273 121.050328,337.729036 L152.348356,383.72226 C153.450868,385.341506 155.810632,385.43896 157.043167,383.916098 L192.248345,340.409573 C193.464762,338.905988 195.785841,338.976669 196.906621,340.552007 L227.545935,383.583039 C228.721519,385.232271 231.184441,385.216207 232.336384,383.550911 L264.830412,336.586354 C265.879196,335.070988 268.056282,334.892143 269.339323,336.215812 L304.85935,382.757352 Z" id="Stroke-3" stroke="#231F20" stroke-width="20"></path>
                        <path d="M247.566244,157.286356 C208.913866,159.417742 178.222635,172.883089 179.015004,187.360559 C179.807372,201.838028 211.782513,211.845286 250.434891,209.7139 C289.086134,207.581374 319.777365,194.117167 318.984996,179.639697 C318.192628,165.162227 286.217487,155.15383 247.566244,157.286356 Z" id="Fill-5" fill="#FFD1F7" opacity="0.748018569"></path>
                        <path d="M224,160 C224,167.731942 218.628079,174 212,174 C205.373399,174 200,167.731942 200,160 C200,152.268058 205.373399,146 212,146 C218.628079,146 224,152.268058 224,160" id="Fill-7" fill="#231F20"></path>
                        <path d="M301,154 C301,163.941438 294.508233,172 286.499339,172 C278.491767,172 272,163.941438 272,154 C272,144.058562 278.491767,136 286.499339,136 C294.508233,136 301,144.058562 301,154" id="Fill-9" fill="#231F20"></path>
                    </g>
                </g>
            </g>
        </svg>
      </div>
      <div class="shadow">
        <svg viewBox="0 0 100 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <ellipse cx="50" cy="25" rx="40" ry="10" style="fill:#09C399;" />
        </svg>
      </div>
      <div class="text">
          <div id="loading-bar">Loading...</div>
      </div>
    </div>

    <!-- Wick project canvas container -->
    <div id="wick-canvas-container"></div>

