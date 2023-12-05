@include('sidebar.index')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Karakter</title>
</head>

<body>
    <div class="p-4 sm:ml-64 sm:mt-23 min-h-screen dark:bg-gray-800">

        <section class="bg-white dark:bg-gray-800">
            <div class="py-4 px-2 mx-auto max-w-screen-xl text-left lg:py-6 mt-9 font-semibold">
                <h1 class="text-2xl tracking-tight leading-none text-gray-900 md:text-3xl lg:text-4xl dark:text-white">
                    CREATE KARAKTER</h1>
            </div>

        </section>

        <form method="POST" action="/create/karakter" enctype="multipart/form-data" class="create_karakter">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Foto
                        Karakter</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="foto_karakter" name="foto_karakter" type="file"
                        onchange="previewImage1()">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG, JPEG
                        (MAX.
                        800x400px).</p>
                    <br>
                    <img src="" alt="" style="width: 100px; height:100px;" id="preview1">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="file_input">Background</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="background" name="background" type="file"
                        onchange="previewImage2()">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG, JPEG
                        (MAX.
                        800x400px).</p>
                    <br>
                    <img src="" alt="" id="preview2" style="width: 100px; height:100px;">
                </div>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="nama_karakter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Karakter</label>
                    <input type="text" id="nama_karakter" name="nama_karakter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Nama" required>
                </div>
                <div>
                    <label for="slug_karakter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug
                        Karakter
                    </label>
                    <input type="tel" id="slug_karakter" name="slug_karakter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Slug" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" disabled>
                </div>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-4">
                <div>
                    <label for="quality_karakter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quality
                        Karakter</label>
                    <input type="text" id="quality_karakter" name="quality_karakter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Quality" required>
                </div>
                <div>
                    <label for="grade_karakter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grade
                        Karakter</label>
                    <select id="grade_karakter" name="grade_karakter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="SS" selected>SS</option>
                        <option value="S">S</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>
                <div>
                    <label for="chakra_karakter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chakra
                        Karakter</label>
                    <select id="chakra_karakter" name="chakra_karakter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Wind" selected>Wind</option>
                        <option value="Earth">Earth</option>
                        <option value="Fire">Fire</option>
                        <option value="Water">Water</option>
                        <option value="Lightning">Lightning</option>
                    </select>
                </div>
                <div>
                    <label for="tier_karakter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tier
                        Karakter</label>
                    <select id="tier_karakter" name="tier_karakter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="SSS" selected>SSS</option>
                        <option value="SS">SS</option>
                        <option value="S">S</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>
                <div>
                    <label for="skill_1_karakter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skill
                        1
                        Karakter</label>
                    <select id="skill_1_karakter" name="skill_1_karakter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($data as $d)
                            <option value="{{ $d->id }}">{{ $d->nama_skill }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="skill_2_karakter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skill
                        2
                        Karakter</label>
                    <select id="skill_2_karakter" name="skill_2_karakter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($data as $d)
                            <option value="{{ $d->id }}">{{ $d->nama_skill }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="skill_3_karakter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skill
                        3
                        Karakter</label>
                    <select id="skill_3_karakter" name="skill_3_karakter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($data as $d)
                            <option value="{{ $d->id }}">{{ $d->nama_skill }}</option>
                        @endforeach
                    </select>
                </div>
                <div>

                    <label for="skill_4_karakter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skill 4
                        Karakter</label>
                    <select id="skill_4_karakter" name="skill_4_karakter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($data as $d)
                            <option value="{{ $d->id }}">{{ $d->nama_skill }}</option>
                        @endforeach
                    </select>
                </div>
                <div>

                    <label for="skill_5_karakter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skill 5
                        Karakter</label>
                    <select id="skill_5_karakter" name="skill_5_karakter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($data as $d)
                            <option value="{{ $d->id }}">{{ $d->nama_skill }}</option>
                        @endforeach
                    </select>
                </div>
                <div>

                    <label for="skill_6_karakter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skill 6
                        Karakter</label>
                    <select id="skill_6_karakter" name="skill_6_karakter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($data as $d)
                            <option value="{{ $d->id }}">{{ $d->nama_skill }}</option>
                        @endforeach
                    </select>
                </div>
                <div>

                    <label for="skill_7_karakter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skill 7
                        Karakter</label>
                    <select id="skill_7_karakter" name="skill_7_karakter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($data as $d)
                            <option value="{{ $d->id }}">{{ $d->nama_skill }}</option>
                        @endforeach
                    </select>
                </div>
                <div>

                    <label for="skill_8_karakter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skill 8
                        Karakter</label>
                    <select id="skill_8_karakter" name="skill_8_karakter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($data as $d)
                            <option value="{{ $d->id }}">{{ $d->nama_skill }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="skill_9_karakter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skill 9
                        Karakter</label>
                    <select id="skill_9_karakter" name="skill_9_karakter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($data as $d)
                            <option value="{{ $d->id }}">{{ $d->nama_skill }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="skill_10_karakter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skill 10
                        Karakter</label>
                    <select id="skill_10_karakter" name="skill_10_karakter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($data as $d)
                            <option value="{{ $d->id }}">{{ $d->nama_skill }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">CREATE</button>
        </form>
    </div>

    <script>
        const nama_karakter = document.querySelector('#nama_karakter');
        const slug_karakter = document.querySelector('#slug_karakter');

        nama_karakter.addEventListener('change', function() {
            fetch('/karakter/checkSlug?nama_karakter=' + nama_karakter.value)
                .then(response => response.json())
                .then(data => slug_karakter.value = data.slug_karakter)
        });

        function previewImage1() {
            var preview = document.querySelector('#preview1');
            var file = document.querySelector('#foto_karakter').files[0];
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

        function previewImage2() {
            var preview = document.querySelector('#preview2');
            var file = document.querySelector('#background').files[0];
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
