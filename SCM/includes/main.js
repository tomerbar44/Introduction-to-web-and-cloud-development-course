(function() {
    function categoryFiltering() {
        var powerGroup = [],
            aerobicGroup = [];
        powerGroup = document.getElementsByClassName('power');
        aerobicGroup = document.getElementsByClassName('aerobic');
        if (this.innerHTML === 'Aerobic') {
            if (powerGroup[0].style.display === 'block') // check two clicks
                powerGroup[0].style.display = 'none';
            else {
                powerGroup[0].style.display = 'block';
            }
            aerobicGroup[0].style.display = 'block';
        } else if (this.innerHTML === 'Power') {
            if (aerobicGroup[0].style.display === 'block') // check two clicks
                aerobicGroup[0].style.display = 'none';
            else {
                aerobicGroup[0].style.display = 'block';
            }
            powerGroup[0].style.display = 'block';
        } else {
            powerGroup[0].style.display = 'block';
            aerobicGroup[0].style.display = 'block';
        }
    }
    // triggers
    document.getElementById('filterPower').onclick = categoryFiltering;
    document.getElementById('filterAerobic').onclick = categoryFiltering;
    document.getElementById('filterAll').onclick = categoryFiltering;
})();