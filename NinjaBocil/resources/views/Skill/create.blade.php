@include('sidebar.index')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Skill</title>
</head>

<body>
    <div class="p-4 sm:ml-64 sm:mt-23 min-h-screen dark:bg-gray-800">

        <section class="bg-white dark:bg-gray-800">
            <div class="py-4 px-2 mx-auto max-w-screen-xl text-left lg:py-6 mt-9 font-semibold">
                <h1 class="text-2xl tracking-tight leading-none text-gray-900 md:text-3xl lg:text-4xl dark:text-white">
                    CREATE SKILL</h1>
            </div>

        </section>

        <form method="POST" action="/create/skill" enctype="multipart/form-data" class="create_skill">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Foto
                        Skill</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" type="file" name="fotoskill" id="fotoskill"
                        onchange="previewImage()">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG, JPEG
                        (MAX.
                        800x400px).</p>
                    <br>
                    <img src="" alt="" id="preview" style="width: 200px; height:200px;">
                </div>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Skill</label>
                    <input type="text" id="nama_skill" name="nama_skill"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Nama" required>
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug
                        Skill
                    </label>
                    <input type="tel" id="slug_skill" name="slug_skill"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Slug" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" disabled>
                </div>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-4">
                <div>
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grade
                        Skill</label>
                    <select id="grade_skill" name="grade_skill"
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
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chakra
                        Skill</label>
                    <select id="chakra_skill" name="chakra_skill"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="None">None</option>
                        <option value="Wind" selected>Wind</option>
                        <option value="Wind, Earth">Wind, Earth</option>
                        <option value="Wind, Fire">Wind, Fire</option>
                        <option value="Wind, Water">Wind, Water</option>
                        <option value="Wind, Lightning">Wind, Lightning</option>
                        <option value="Earth">Earth</option>
                        <option value="Earth, Fire">Earth, Fire</option>
                        <option value="Earth, Water">Earth, Water</option>
                        <option value="Earth, Lightning">Earth, Lightning</option>
                        <option value="Fire">Fire</option>
                        <option value="Fire, Water">Fire, Water</option>
                        <option value="Fire, Lightning">Fire, Lightning</option>
                        <option value="Water">Water</option>
                        <option value="Water, Lightning">Water, Lightning</option>
                        <option value="Lightning">Lightning</option>
                    </select>
                </div>
                <div>
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Damage
                        Skill</label>
                    <input type="text" id="damage_skill" name="damage_skill"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Damage" required>
                </div>
                <div>
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Proc Rate
                        Skill</label>
                    <input type="text" id="proc_rate_skill" name="proc_rate_skill"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Proc Rate" required>
                </div>
                <div>
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Effect
                        Skill</label>
                    <input type="text" id="effect_skill" name="effect_skill"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Effect" required>
                </div>
                <div>
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Launch
                        Skill</label>
                    <input type="text" id="launch_skill" name="launch_skill"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Launch" required>
                </div>
                <div>
                    <label for="company"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Restriction
                        Skill</label>
                    <input type="text" id="restriction_skill" name="restriction_skill"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Restriction" required>
                </div>
                <div>
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Round
                        Skill</label>
                    <select id="round_skill" name="round_skill"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                <div>
                    <label for="countries"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <select id="kartegori" name="kartegori"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Skill" selected>Skill</option>
                        <option value="Tailed">Tailed</option>
                        <option value="Summon">Summon</option>
                    </select>
                </div>
                <div>
                    <label for="countries"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <select id="tier_skill" name="tier_skill"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="SS" selected>SS</option>
                        <option value="S">S</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>
            </div>
            <button type="submit" id="tambah"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">CREATE</button>
        </form>

    </div>

    <script>
        const nama_skill = document.querySelector('#nama_skill');
        const slug_skill = document.querySelector('#slug_skill');

        nama_skill.addEventListener('change', function() {
            fetch('/skill/checkSlug?nama_skill=' + nama_skill.value)
                .then(response => response.json())
                .then(data => slug_skill.value = data.slug_skill)
        });

        function previewImage() {
            var preview = document.querySelector('#preview');
            var file = document.querySelector('#fotoskill').files[0];
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
