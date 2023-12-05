@include('sidebar.index')

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="{{ session('darkMode', false) ? 'dark' : '' }}">
    <div class="p-4 sm:ml-64 sm:mt-23 dark:bg-[#111827] min-h-screen">
        <section class="bg-white dark:bg-[#111827]">
            <div class="py-4 px-2 mx-auto max-w-screen-xl text-left lg:py-6 mt-9 font-semibold">
                <h1 class="text-2xl tracking-tight leading-none text-gray-900 md:text-3xl lg:text-4xl dark:text-white">
                    SETTING</h1>
            </div>
        </section>

        <form method="POST" action="/user/update/{{ Auth::user()->id }}" enctype="multipart/form-data"
            class="update_user">
            @csrf
            <div class="container flex">

                <div class="rounded p-8 m-4 dark:bg-[#1F2937] inline-block">
                    <div>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="foto_user" name="foto_user" type="file"
                            style="display: none;" onchange="previewImage()">
                        <br>
                        <img src="{{ Storage::url('image/' . Auth::user()->foto_user) }}" alt=""
                            class="rounded-full hover:brightness-50 transition duration-300 ease-in-out"
                            style="width: 200px; height:200px; cursor:pointer;" id="preview">
                    </div>

                    <div class="mt-5">
                        <label for="quality_karakter"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" id="username" name="username" value="{{ Auth::user()->username }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Username" required>
                    </div>

                    <br>

                    <div>
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="text" id="email" name="email" value="{{ Auth::user()->email }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Email" required disabled>
                    </div>

                </div>

                <div class="rounded p-8 m-4 dark:bg-[#1F2937] w-full">
                    <div>
                        <label for="First Name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                            Name</label>
                        <input type="text" id="first_name" name="first_name" value="{{ Auth::user()->first_name }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="First Name" required>
                    </div>
                    <div>
                        <label for="Last Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                            Name</label>
                        <input type="text" id="last_name" name="last_name" value="{{ Auth::user()->last_name }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Last Name" required>
                    </div>
                    <div>
                        <label for="bio"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bio</label>
                        <input type="text" id="about_user" name="about_user" value="{{ Auth::user()->about_user }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Bio" required>
                    </div>
                    <div>
                        <label for="Tanggal Lahir"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ Auth::user()->tanggal_lahir }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Email" required disabled>
                    </div>
                    <div>
                        <label for="negara"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Negara:</label>
                        <select id="negara" name="negara"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="Indonesia">Indonesia</option>
                            <option value="Malaysia">Malaysia</option>
                        </select>
                    </div>
                    <div>
                        <label for="kota"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota:</label>
                        <select id="kota" name="kota"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </select>
                    </div>

                    <button type="submit"
                        class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">SAVE</button>
                </div>
            </div>
        </form>


    </div>

    <script>
        const negaraSelect = document.getElementById('negara');
        const kotaSelect = document.getElementById('kota');

        const userNegara = '{{ Auth::user()->negara }}';
        const userKota = '{{ Auth::user()->kota }}';

        negaraSelect.value = userNegara;

        const kotaOptions = {
            Indonesia: ['Jakarta', 'Palembang', 'Bandung', 'Surabaya', 'Yogyakarta', 'Medan', 'Semarang', 'Makassar',
                'Malang', 'Bogor'
            ],
            Malaysia: ['Lombok', 'Bali', 'Kuala Lumpur', 'Penang', 'Johor Bahru', 'Langkawi', 'Kota Kinabalu',
                'Malacca City', 'Putrajaya', 'Kuching'
            ]
        };

        // Mengisi opsi kota berdasarkan negara pengguna
        const fillKotaOptions = (negara) => {
            kotaSelect.innerHTML = '';

            if (kotaOptions.hasOwnProperty(negara)) {
                const kota = kotaOptions[negara];

                for (let i = 0; i < kota.length; i++) {
                    const option = document.createElement('option');
                    option.text = kota[i];
                    option.value = kota[i];

                    if (kota[i] === userKota) {
                        option.selected = true;
                    }

                    kotaSelect.appendChild(option);
                }
            }
        };

        fillKotaOptions(userNegara);

        negaraSelect.addEventListener('change', function() {
            const selectedNegara = this.value;
            fillKotaOptions(selectedNegara);
        });

        document.getElementById('preview').addEventListener('click', function() {
            document.getElementById('foto_user').click();
        });

        function previewImage() {
            var preview = document.querySelector('#preview');
            var file = document.querySelector('#foto_user').files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }
    </script>


</body>

</html>
