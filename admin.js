(function(){
    var savedTheme = localStorage.getItem('adminTheme') || 'light';
    var body = document.body;

    function applyTheme(theme){
        body.classList.toggle('theme-dark', theme === 'dark');
        localStorage.setItem('adminTheme', theme);

        var toggle = document.querySelector('[data-theme-toggle]');
        if(toggle){
            toggle.innerHTML = theme === 'dark' ? 'Tema Terang' : 'Tema Gelap';
            toggle.setAttribute('aria-label', theme === 'dark' ? 'Aktifkan tema terang' : 'Aktifkan tema gelap');
        }
    }

    applyTheme(savedTheme);

    document.addEventListener('click', function(event){
        var toggle = event.target.closest('[data-theme-toggle]');
        if(!toggle){
            return;
        }

        var nextTheme = body.classList.contains('theme-dark') ? 'light' : 'dark';
        applyTheme(nextTheme);
    });
})();
