export default class Datatable {
  constructor(selector) {
    this.selector = selector

    this.initComponent(selector)
  }

  initComponent() {
    $(`${this.selector} .datatable__menu-item[data-toggle]`).click((e) => this.handleTabChange(e.target.getAttribute('data-toggle')))
  }

  handleTabChange(tab_id) {
    $(`${this.selector} .datatable__menu-item[data-toggle!=${tab_id}]`).removeClass('datatable__menu-item--active')
    $(`${this.selector} .datatable__menu-item[data-toggle=${tab_id}]`).addClass('datatable__menu-item--active')
    $(`${this.selector} .datatable__tab[data-id != ${tab_id}]`).removeClass('datatable__tab--active')
    $(`${this.selector} .datatable__tab[data-id=${tab_id}]`).addClass('datatable__tab--active')
  }
}
