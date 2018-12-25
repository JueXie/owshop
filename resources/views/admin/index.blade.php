@extends('admin.master')

@section('content')
    <aside class="Hui-aside">
        <input runat="server" id="divScrollValue" type="hidden" value="" />
        <div class="menu_dropdown bk_2">
            <dl id="menu-picture">
                <dt><i class="Hui-iconfont">&#xe613;</i> 图片管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a _href="picture-list.html" data-title="图片管理" href="javascript:void(0)">图片管理</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-product">
                <dt><i class="Hui-iconfont">&#xe620;</i> 产品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a _href="/admin/category" data-title="分类管理" href="javascript:void(0)">分类管理</a></li>
                        <li><a _href="/admin/categorydel" data-title="删除分类" href="javascript:void(0)">已删除的分类</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-page">
                <dt><i class="Hui-iconfont">&#xe626;</i> 页面管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a _href="page-home.html" href="javascript:void(0)">首页管理</a></li>
                        <li><a _href="page-flinks.html" href="javascript:void(0)">友情链接</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-comments">
                <dt><i class="Hui-iconfont">&#xe622;</i> 评论管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a _href="http://h-ui.duoshuo.com/admin/" data-title="评论列表" href="javascript:;">评论列表</a></li>
                        <li><a _href="feedback-list.html" data-title="意见反馈" href="javascript:void(0)">意见反馈</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-order">
                <dt><i class="Hui-iconfont">&#xe63a;</i> 财务管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a _href="order-list.html" href="javascript:void(0)">订单列表</a></li>
                        <li><a _href="recharge-list.html" href="javascript:void(0)">充值管理</a></li>
                        <li><a _href="invoice-list.html" href="javascript:void(0)">发票管理</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-member">
                <dt><i class="Hui-iconfont">&#xe60d;</i> 会员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a _href="/admin/memberList" data-title="会员列表" href="javascript:;">会员列表</a></li>
                        <li><a _href="/admin/memberDel" data-title="删除的会员" href="javascript:;">删除的会员</a></li>
                        <li><a _href="member-level.html" data-title="等级管理" href="javascript:;">等级管理</a></li>
                        <li><a _href="member-scoreoperation.html" data-title="积分管理" href="javascript:;">积分管理</a></li>
                        <li><a _href="member-record-browse.html" data-title="浏览记录" href="javascript:void(0)">浏览记录</a></li>
                        <li><a _href="member-record-download.html" data-title="下载记录" href="javascript:void(0)">下载记录</a></li>
                        <li><a _href="member-record-share.html" data-title="分享记录" href="javascript:void(0)">分享记录</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-admin">
                <dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a _href="admin-role.html" data-title="角色管理" href="javascript:void(0)">角色管理</a></li>
                        <li><a _href="admin-permission.html" data-title="权限管理" href="javascript:void(0)">权限管理</a></li>
                        <li><a _href="admin-list.html" data-title="管理员列表" href="javascript:void(0)">管理员列表</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-system">
                <dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a _href="system-base.html" data-title="系统设置" href="javascript:void(0)">系统设置</a></li>
                        <li><a _href="system-category.html" data-title="栏目管理" href="javascript:void(0)">栏目管理</a></li>
                        <li><a _href="system-data.html" data-title="数据字典" href="javascript:void(0)">数据字典</a></li>
                        <li><a _href="system-shielding.html" data-title="屏蔽词" href="javascript:void(0)">屏蔽词</a></li>
                        <li><a _href="system-log.html" data-title="系统日志" href="javascript:void(0)">系统日志</a></li>
                    </ul>
                </dd>
            </dl>
        </div>
    </aside>
    <div class="dislpayArrow"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
    <section class="Hui-article-box">
        <div id="Hui-tabNav" class="Hui-tabNav">
            <div class="Hui-tabNav-wp">
                <ul id="min_title_list" class="acrossTab cl">
                    <li class="active"><span title="我的桌面" data-href="welcome.html">我的桌面</span><em></em></li>
                </ul>
            </div>
            <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
        </div>
        <div id="iframe_box" class="Hui-article">
            <div class="show_iframe">
                <div style="display:none" class="loading"></div>
                <iframe scrolling="yes" frameborder="0" src="admin/welcome"></iframe>
            </div>
        </div>
    </section>
@endsection