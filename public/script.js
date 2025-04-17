document.getElementById('first_name').addEventListener('input', function (event) {
    // Pieņem tikai burtus un atstarpes
    this.value = this.value.replace(/[^a-zA-ZāčēģīķļņšūžĀČĒĢĪĶĻŅŠŪŽ\s]/g, '');
});

document.getElementById('last_name').addEventListener('input', function (event) {
    // Pieņem tikai burtus un atstarpes
    this.value = this.value.replace(/[^a-zA-ZāčēģīķļņšūžĀČĒĢĪĶĻŅŠŪŽ\s]/g, '');
});