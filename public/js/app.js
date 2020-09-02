document.querySelector('#filter_company_id').addEventListener('change', function () {
    let company_id = this.value || this.options[this.selectedIndex].value;
    let location = window.location.href;
    // console.log(location);
    window.location.href = window.location.href.split('?')[0] + '?company_id=' + company_id;
});

document.querySelectorAll('.btn-delete').forEach((button) => {

    button.addEventListener('click', function (event) {
        event.preventDefault();
        if (confirm('Are you sure?')) {
            let action = this.getAttribute('href');
            let form = document.querySelector('#form-delete');
            form.setAttribute('action', action);
            form.submit();
        }
    });
});

document.querySelector('#btn-clear').addEventListener('click', function () {
    // let input = document.querySelector('#search');
    // let select = document.querySelector('#filter_company_id');
    //
    // input.value = "";
    // select.selectedIndex = 0;

    window.location.href = window.location.href.split('?')[0];
})

const toggleClearButton = () => {
    let query = location.search;
    let pattern = /[?&]search=/;
    let button = document.querySelector('#btn-clear');

    if (pattern.test(query)) {
        button.style.display = 'block';
    } else {
        button.style.display = 'none';
    }
}

toggleClearButton();
