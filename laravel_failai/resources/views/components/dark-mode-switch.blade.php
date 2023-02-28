@if(!isset($enabled) || $enabled === true)
    <div>
        <div class="darkmode-switch">
            <input type="checkbox" id="darkmode-switch"/>
            <label for="darkmode-switch">Dark mode</label>
        </div>
    </div>

    <script>
        const toggleSwitch = document.querySelector('.darkmode-switch input[type="checkbox"]');
        const currentTheme = localStorage.getItem('theme');

        if (currentTheme) {
            document.documentElement.setAttribute('data-theme', currentTheme);

            if (currentTheme === 'dark') {
                toggleSwitch.checked = true;
            }
        }

        function switchTheme(e) {
            if (e.target.checked) {
                document.documentElement.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
            } else {
                document.documentElement.setAttribute('data-theme', 'light');
                localStorage.setItem('theme', 'light');
            }
        }

        toggleSwitch.addEventListener('change', switchTheme, false);
    </script>
@endif
