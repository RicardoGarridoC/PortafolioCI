var myCollapse = document.getElementById('collapseExample')
myCollapse.addEventListener('show.bs.collapse', function () {
  document.body.classList.add('offcanvas-open')
})

myCollapse.addEventListener('hide.bs.collapse', function () {
  document.body.classList.remove('offcanvas-open')
})
