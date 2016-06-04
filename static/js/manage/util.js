/**
 * Created by Administrator on 2016/5/6.
 */
var Util = {};
(
    function(g,$)
    {
        var restBlock = function(api,option)
        {
            option = $.extend(
                {
                    'primary_key':'id',
                    'wrapperMaker':function(container){return container},
                    'rowMaker':function(item){return item;},
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
                '<div class="col-xs-12 resources-content">' +
                '</div>' +
                    '<div class="col-sm-12">'+
                        '<div class="dataTables_paginate paging_bootstrap">'+
                            '<ul class="pagination">'+
                            '</ul>'+
                        '</div>'+
                    '</div>'
            ).appendTo(container);
            var pagination = elementBox.find('.pagination');

            if (typeof api === 'function')api = api();
            var wrapper = option.wrapperMaker(elementBox.find('.resources-content'));


            function reBuild(data)
            {
                wrapper.empty();
                wrapper.append(
                    $.map(
                        data,
                        option.rowMaker
                    )
                );

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
                reBuild(list);
                reBuilPagination(currPage,perPage,pageCount);
            }

            function getData(page,size)
            {
                api.getList(page,size,getConditions(),apiSuccess);
            }
            function reload()
            {
                getData(option.page,option.page_size);
            }
            function getApi()
            {
                return api;
            }
            reload();
            this.reload = reload;
            this.getApi = getApi;
        };
        var restTable = function(api,option)
        {
            var _self = this;
            option = $.extend(
                {
                    'header':[],
                    'data_map':[],
                    'delete':true,
                    'edit':true
                },option
            );


            option.wrapperMaker = function(ele)
            {
                var table = $('<table id="sample-table-1" class="table table-striped table-bordered table-hover"><thead><tr></tr></thead><tbody></tbody></table>').appendTo(ele);
                var tbody = table.find('tbody');
                var headerTr = table.find('thead tr');
                option.header.map(
                    function(h)
                    {
                        var th = $('<th></th>').appendTo(headerTr);
                        h.element && th.append(h.element);
                        h.class && th.addClass(h.class);
                        h.width && th.width(h.width);
                    }
                );
                return tbody;

            };


            option.rowMaker = function(data)
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
                                content = d.format.call(_self,content,data);
                            }
                            td.append(content);
                        }
                        d.class && td.addClass(d.class);
                    }
                );
                return tr;
            };
            return new restBlock(api,option);
        };
        var imageGallery = function(option)
        {
            var api = Api.restResources();
            option = $.extend(
                {
                    'delete':true,
                    'fixed_condition':{'type':0},
                    'primary_key':'id',
                    'rowMaker':rowMaker
                },option
            );


            option.wrapperMaker = function(ele)
            {

                return $('<div class="row-fluid"><ul class="ace-thumbnails"></ul></div>').appendTo(ele).find('ul');

            };


            function rowMaker (data)
            {
                var ele = $(
                    '<li>' +
                        '<a href="'+data.url+'" data-rel="colorbox" class="cboxElement">'+
                            '<img style="max-width:150px;max-height:150px;" alt="150x150" src="'+data.url+'">'+
                            '<div class="text">'+
                                '<div class="inner">'+data.name+'</div>'+
                            '</div>'+
                        '</a>'+
                        '<div class="tools tools-bottom">'+
                            '<a href="javascript:void(0);" id="delete-item"><i class="icon-remove red"></i></a>'+
                        '</div>'+
                    '</li>'
                );
                ele.find('#delete-item').on('click',
                    function()
                    {
                        api.delete(data.id,function(){_restBlock.reload();});
                    }
                );
                return ele;
            };
            var _restBlock = new restBlock(api,option);
            return _restBlock;
        };
        // var restTable = function(api,option)
        // {
        //     option = $.extend(
        //         {
        //             'primary_key':'id',
        //             'header':[],
        //             'data_map':[],
        //             'page':1,
        //             'page_size':10,
        //             'condition':{},
        //             'fixed_condition':{},
        //             'delete':true,
        //             'edit':true
        //         },option
        //     );
        //     function getConditions()
        //     {
        //         return option.fixed_condition;
        //     }
        //     var container = option.container;
        //     if (typeof container === 'string')container = $(container);
        //
        //     var elementBox = $('' +
        //         '<div class="row">' +
        //             '<div class="col-xs-12">' +
        //                 '<div class="table-responsive"></div>' +
        //             '</div>' +
        //         '</div>' +
        //         '<div class="row">' +
        //             '<div class="col-sm-6">' +
        //                 '<div class="dataTables_info" id="sample-table-2_info"></div>'+
        //                 '</div>'+
        //                 '<div class="col-sm-6">'+
        //                     '<div class="dataTables_paginate paging_bootstrap">'+
        //                         '<ul class="pagination">'+
        //                             '<li class="prev disabled"><a href="#"><i class="icon-double-angle-left"></i></a></li>'+
        //                             '<li class="active"><a href="#">1</a></li>'+
        //                             '<li><a href="#">2</a></li>'+
        //                             '<li><a href="#">3</a></li>'+
        //                             '<li class="next"><a href="#"><i class="icon-double-angle-right"></i></a></li>'+
        //                         '</ul>'+
        //                 '</div>'+
        //             '</div>'+
        //         '</div>'
        //     ).appendTo(container);
        //     var pagination = elementBox.find('.pagination');
        //
        //     if (typeof api === 'function')api = api();
        //     var table = $('<table id="sample-table-1" class="table table-striped table-bordered table-hover"><thead><tr></tr></thead><tbody></tbody></table>').appendTo(elementBox.find('.table-responsive'));
        //     var tbody = table.find('tbody');
        //     var headerTr = table.find('thead tr');
        //     option.header.map(
        //         function(h)
        //         {
        //             var th = $('<th></th>').appendTo(headerTr);
        //             h.element && th.append(h.element);
        //             h.class && th.addClass(h.class);
        //         }
        //     );
        //
        //     function reBuilTable(data)
        //     {
        //         tbody.empty();
        //         tbody.append($.map(data,makeRow));
        //
        //     }
        //     function makeRow(data)
        //     {
        //         var tr = $('<tr></tr>');
        //         option.data_map.map(
        //             function(d)
        //             {
        //                 var td = $('<td></td>').appendTo(tr);
        //                 if (d.key && d.key in data)
        //                 {
        //                     var content = data[d.key];
        //                     if (typeof d.format  === 'function')
        //                     {
        //                         content = d.format(content);
        //                     }
        //                     td.append(content);
        //                 }
        //                 d.class && td.addClass(d.class);
        //             }
        //         );
        //         return tr;
        //     }
        //     function toPageFunction(page)
        //     {
        //         return function()
        //         {
        //             getData(page,option.page_size);
        //         }
        //     }
        //     function reBuilPagination(currPage,perPage,pageCount)
        //     {
        //         console.log(currPage,perPage,pageCount);
        //         pagination.empty();
        //         var prev = $('<li class="prev"><a href="javascript:void(0);"><i class="icon-double-angle-left"></i></a></li>').appendTo(pagination);
        //
        //         if (currPage == 1)
        //         {
        //             prev.addClass('disabled');
        //         }
        //         else
        //         {
        //             prev.on('click',toPageFunction(currPage-1));
        //         }
        //         for(var p = 1;p <=pageCount;p++)
        //         {
        //             var pageBtn  = $('<li><a href="javascript:void(0);">'+p+'</a></li>').appendTo(pagination);
        //             if (p == currPage)
        //             {
        //                 pageBtn.addClass('active');
        //             }
        //             else
        //             {
        //                 pageBtn.on('click',toPageFunction(p));
        //             }
        //         }
        //         var next = $('<li class="next"><a href="javascript:void(0);"><i class="icon-double-angle-right"></i></a></li>').appendTo(pagination);
        //         if (currPage == pageCount)
        //         {
        //             next.addClass('disabled');
        //         }
        //         else
        //         {
        //             next.on('click',toPageFunction(currPage+1));
        //         }
        //     }
        //     function apiSuccess(list,currPage,perPage,pageCount,totalCount)
        //     {
        //         reBuilTable(list);
        //         reBuilPagination(currPage,perPage,pageCount);
        //     }
        //
        //     function getData(page,size)
        //     {
        //         api.getList(page,size,getConditions(),apiSuccess);
        //     }
        //
        //     getData(option.page,option.page_size);
        // };

        function openSubWindow(url)
        {
            var CenterPopup = function (url, target, w, h, scroll, resiz) {
                if (w < 1 && h < 1) {
                    // 自动计算宽度和高度
                    w = screen.width * w;
                    h = screen.height * h;
                }

                var winl = (screen.width - w) / 2;
                var wint = (screen.height - h) / 2;
                var winprops = 'height=' + h + ',width=' + w + ',top=' + wint + ',left=' + winl + ',scrollbars=' + scroll + ',resizable=' + resiz + ', toolbars=false, status=false, menubar=false';
                var win = window.open(url, Math.random(), winprops);
                return win;
            }
            if (url.match(/\?/))
            {
                url = url + '&sub-window=1';
            }
            else
            {
                url = url + '?sub-window=1';
            }
            return CenterPopup(url, null, 0.8, 0.7, "yes", "yes");
        }

        $.extend(g,{'RestTable':restTable,'openSubWindow':openSubWindow,'restBlock':restBlock,'imageGallery':imageGallery});
    }
)(window.Util,window.jQuery);