/**
 * Created by Administrator on 2016/5/6.
 */
var Util = {};
(
    function(g,$)
    {
        var restTable = function(api,option)
        {
            option = $.extend(
                {
                    'primary_key':'id',
                    'header':[],
                    'data_map':[],
                    'page':1,
                    'page_size':10,
                    'condition':{},
                    'fixed_condition':{},
                    'delete':true,
                    'edit':true
                },option
            );
            function getConditions()
            {
                return option.fixed_condition;
            }
            var container = option.container;
            if (typeof container === 'string')container = $(container);

            var elementBox = $('' +
                '<div class="row">' +
                    '<div class="col-xs-12">' +
                        '<div class="table-responsive"></div>' +
                    '</div>' +
                '</div>' +
                '<div class="row">' +
                    '<div class="col-sm-6">' +
                        '<div class="dataTables_info" id="sample-table-2_info"></div>'+
                        '</div>'+
                        '<div class="col-sm-6">'+
                            '<div class="dataTables_paginate paging_bootstrap">'+
                                '<ul class="pagination">'+
                                    '<li class="prev disabled"><a href="#"><i class="icon-double-angle-left"></i></a></li>'+
                                    '<li class="active"><a href="#">1</a></li>'+
                                    '<li><a href="#">2</a></li>'+
                                    '<li><a href="#">3</a></li>'+
                                    '<li class="next"><a href="#"><i class="icon-double-angle-right"></i></a></li>'+
                                '</ul>'+
                        '</div>'+
                    '</div>'+
                '</div>'
            ).appendTo(container);
            var pagination = elementBox.find('.pagination');

            if (typeof api === 'function')api = api();
            var table = $('<table id="sample-table-1" class="table table-striped table-bordered table-hover"><thead><tr></tr></thead><tbody></tbody></table>').appendTo(elementBox.find('.table-responsive'));
            var tbody = table.find('tbody');
            var headerTr = table.find('thead tr');
            option.header.map(
                function(h)
                {
                    var th = $('<th></th>').appendTo(headerTr);
                    h.element && th.append(h.element);
                    h.class && th.addClass(h.class);
                }
            );

            function reBuilTable(data)
            {
                tbody.empty();
                tbody.append($.map(data,makeRow));

            }
            function makeRow(data)
            {
                var tr = $('<tr></tr>');
                option.data_map.map(
                    function(d)
                    {
                        var td = $('<td></td>').appendTo(tr);
                        if (d.key && d.key in data)
                        {
                            var content = data[d.key];
                            if (typeof d.format  === 'function')
                            {
                                content = d.format(content);
                            }
                            td.append(content);
                        }
                        d.class && td.addClass(d.class);
                    }
                );
                return tr;
            }
            function toPageFunction(page)
            {
                return function()
                {
                    getData(page,option.page_size);
                }
            }
            function reBuilPagination(currPage,perPage,pageCount)
            {
                console.log(currPage,perPage,pageCount);
                pagination.empty();
                var prev = $('<li class="prev"><a href="javascript:void(0);"><i class="icon-double-angle-left"></i></a></li>').appendTo(pagination);

                if (currPage == 1)
                {
                    prev.addClass('disabled');
                }
                else
                {
                    prev.on('click',toPageFunction(currPage-1));
                }
                for(var p = 1;p <=pageCount;p++)
                {
                    var pageBtn  = $('<li><a href="javascript:void(0);">'+p+'</a></li>').appendTo(pagination);
                    if (p == currPage)
                    {
                        pageBtn.addClass('active');
                    }
                    else
                    {
                        pageBtn.on('click',toPageFunction(p));
                    }
                }
                var next = $('<li class="next"><a href="javascript:void(0);"><i class="icon-double-angle-right"></i></a></li>').appendTo(pagination);
                if (currPage == pageCount)
                {
                    next.addClass('disabled');
                }
                else
                {
                    next.on('click',toPageFunction(currPage+1));
                }
            }
            function apiSuccess(list,currPage,perPage,pageCount,totalCount)
            {
                reBuilTable(list);
                reBuilPagination(currPage,perPage,pageCount);
            }

            function getData(page,size)
            {
                api.getList(page,size,getConditions(),apiSuccess);
            }

            getData(option.page,option.page_size);
        };

        function openSubWindow(url)
        {
            function CenterPopup(url)
            {

            }
            if (url.match(/\?/))
            {
                url = url + '&sub-window=1';
            }
            else
            {
                url = url + '?sub-window=1';
            }
            return CenterPopup(url);
        }

        $.extend(g,{'RestTable':restTable,'openSubWindow':openSubWindow});
    }
)(window.Util,window.jQuery);