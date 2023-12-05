@include('sidebar.index')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Tailed</title>
</head>

<body>
    <div class="p-4 sm:ml-64 sm:mt-23 min-h-screen dark:bg-gray-800">

        <section class="bg-white dark:bg-gray-800">
            <div class="py-4 px-2 mx-auto max-w-screen-xl text-left lg:py-6 mt-9 font-semibold">
                <h1 class="text-2xl tracking-tight leading-none text-gray-900 md:text-3xl lg:text-4xl dark:text-white">
                    CREATE TAILED</h1>
            </div>

        </section>

        <form method="POST" action="/create/tailed" enctype="multipart/form-data" class="create_tailed">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Foto
                        Tailed</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="foto_tailed" name="foto_tailed" type="file"
                        onchange="previewImage()">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF
                        (MAX.
                        800x400px).</p>
                    <br>
                    <img src="" alt="" style="width: 200px; height:200px;" id="preview">
                </div>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Tailed</label>
                    <input type="text" id="nama_tailed" name="nama_tailed"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Nama" required>
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug
                        Tailed
                    </label>
                    <input type="text" id="slug_tailed" name="slug_tailed"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Slug" required>
                </div>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-4">
                <div>
                    <label for="skill_1_tailed"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skill
                        1
                        Tailed</label>
                    <select id="skill_1_tailed" name="skill_1_tailed"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($data as $d)
                            <option value="{{ $d->id }}">{{ $d->nama_skill }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="skill_2_tailed"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skill
                        2
                        Tailed</label>
                    <select id="skill_2_tailed" name="skill_2_tailed"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($data as $d)
                            <option value="{{ $d->id }}">{{ $d->nama_skill }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="skill_3_tailed"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skill
                        3
                        Tailed</label>
                    <select id="skill_3_tailed" name="skill_3_tailed"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($data as $d)
                            <option value="{{ $d->id }}">{{ $d->nama_skill }}</option>
                        @endforeach
                    </select>
                </div>
                <div>

                    <label for="skill_4_tailed"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skill
                        4
                        Tailed</label>
                    <select id="skill_4_tailed" name="skill_4_tailed"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($data as $d)
                            <option value="{{ $d->id }}">{{ $d->nama_skill }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" id="tambah"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">CREATE</button>
            <br>
            <br>
        </form>
    </div>

    <script>
        const nama_tailed = document.querySelector('#nama_tailed');
        const slug_tailed = document.querySelector('#slug_tailed');

        nama_tailed.addEventListener('change', function() {
            fetch('/tailed/checkSlug?nama_tailed=' + nama_tailed.value)
                .then(response => response.json())
                .then(data => slug_tailed.value = data.slug_tailed)
        });

        function previewImage() {
            var preview = document.querySelector('#preview');
            var file = document.querySelector('#foto_tailed').files[0];
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
