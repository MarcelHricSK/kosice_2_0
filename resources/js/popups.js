export default class MediaPopup {
    static components = {
        body: `
      <div class="media-images__item" data-action="add-media" data-id=":id">
        <div class="media-images__overlay">

        </div>
        <img class="media-images__img" src=":src" alt="">
      </div>
    `,
        paginationLink: `
      <div class="pagination__link pagination__link--secondary" data-action="media-popup-pagination" data-id=":page">
        :page
      </div>
    `,
        image: `
      <div class="image" data-id=":id">
        <input type="hidden" name="images[:key][id]" value=":id">
        <img class="image__img" src=":url">
        <div class="image__remove" data-action="remove-media" data-id=":id">
          <svg class="icon icon--white" width="10" height="10" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8.70041 6.73923L13.9933 1.44632L12.5791 0.0321045L7.28619 5.32501L1.99332 0.0321336L0.579102 1.44635L5.87198 6.73923L0.579102 12.0321L1.99332 13.4463L7.28619 8.15344L12.5791 13.4463L13.9933 12.0321L8.70041 6.73923Z" fill="#FAFAFA"/>
          </svg>
        </div>
      </div>
    `
    }

    static setActivePage(page) {
        $('.media-popup__pagination .pagination__link[data-id]').each(() => {
            const elPage = $(this).attr('data-id')
            $(this).remove()

        })

        $('.media-popup__pagination .pagination__link[data-id]').remove()
        for (let i = Math.max(1, Number.parseInt(page) - 2); i < page; i++) {
            $('.media-popup__inner-pagination').append(format(MediaPopup.components.paginationLink, {
                page: i,
            }))
        }
        $('.media-popup__inner-pagination').append(format(MediaPopup.components.paginationLink, {
            page,
        }))

        for (let i = Number.parseInt(page) + 1; i < Math.min(_state_.maxMediaPage + 1, Number.parseInt(page) + 3); i++) {
            $('.media-popup__inner-pagination').append(format(MediaPopup.components.paginationLink, {
                page: i,
            }))
        }
        $('.media-popup__pagination .pagination__link').removeClass('pagination__link--active')
        $(`.media-popup__pagination .pagination__link[data-id="${page}"]`).addClass('pagination__link--active')
    }

    constructor() {
        $(document).ready(function () {
            $.ajax({
                url: '/api/v1/medium',
                data: {page: 1, limit: 30},
            }).done((res) => {
                if (res.data) {
                    _state_.maxMediaPage = Math.ceil(res.total / 30)
                    res.data.map((image) => {
                        $('#media_images').append(format(MediaPopup.components.body, {id: image.id, src: image.url}))
                    })
                    MediaPopup.setActivePage(1)
                }
            })

            $(document).on('click', '[data-action="media-popup-pagination"]', function (e) {
                const page = $(this).attr('data-id')
                const url = $(this).find('.media-images__img').attr('src')
                const key = _state_.lastMediaKey ? _state_.lastMediaKey + 1 : 1

                $.ajax({
                    url: '/api/v1/medium',
                    data: {page: page, limit: 30},
                }).done((res) => {
                    if (res.data) {
                        $('#media_images').empty()
                        res.data.map((image) => {
                            $('#media_images').append(format(MediaPopup.components.body, {id: image.id, src: image.url}))
                        })
                        MediaPopup.setActivePage(page)
                        _state_.currentMediaPage = Number.parseInt(page)
                    }
                })
            })

            $(document).on('click', '[data-action="media-popup-pagination-prev"]', function (e) {
                const id = $(this).attr('data-id')
                const url = $(this).find('.media-images__img').attr('src')
                const key = _state_.lastMediaKey ? _state_.lastMediaKey + 1 : 1

                if (_state_.currentMediaPage > 1) {
                    const page = _state_.currentMediaPage - 1
                    $.ajax({
                        url: '/api/v1/medium',
                        data: {page: page, limit: 30},
                    }).done((res) => {
                        if (res.data) {
                            $('#media_images').empty()
                            res.data.map((image) => {
                                $('#media_images').append(format(MediaPopup.components.body, {id: image.id, src: image.url}))
                            })
                        }
                        MediaPopup.setActivePage(page)
                        _state_.currentMediaPage = Number.parseInt(page)
                    })
                }
            })

            $(document).on('click', '[data-action="media-popup-pagination-next"]', function (e) {
                const id = $(this).attr('data-id')
                const url = $(this).find('.media-images__img').attr('src')
                const key = _state_.lastMediaKey ? _state_.lastMediaKey + 1 : 1

                if (_state_.currentMediaPage < _state_.maxMediaPage) {
                    const page = _state_.currentMediaPage + 1

                    $.ajax({
                        url: '/api/v1/medium',
                        data: {page: _state_.currentMediaPage + 1, limit: 30},
                    }).done((res) => {
                        if (res.data) {
                            $('#media_images').empty()
                            res.data.map((image) => {
                                $('#media_images').append(format(MediaPopup.components.body, {id: image.id, src: image.url}))
                            })

                        }
                        MediaPopup.setActivePage(page)
                        _state_.currentMediaPage = Number.parseInt(page)
                    })
                }

            })

            $(document).on('click', '[data-action="remove-media"]', function (e) {
                const id = $(this).attr('data-id')
                $(`#images .image[data-id=${id}]`).remove()
            })
        })
    }
}
