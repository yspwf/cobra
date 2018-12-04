# cobra
swoole  创建简单的框架

框架遵循 psr-4 原则， 采用spl_autoload_register自动加载的方式引入文件

项目遵循 mvc 的结构， 数据加载的基本方式为：入口 -> 模型（model） -> 控制器(controller) -> 视图 (views)

采用单入口文件（index.php）

路由为 path_info 的模式：地址：端口/index.php/路由

列如：127.0.0.1：(端口)/index.php/article/article/article

及执行控制器 返回数据
控制器（controller） 执行需继承 控制器基类 （controller）

