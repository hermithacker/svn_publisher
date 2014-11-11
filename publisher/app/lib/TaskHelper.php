<?php
/**
* 这是整个任务系统的核心，是Web操作命令行、文件的所有逻辑
* 注册为facade
*/
namespace TaskCore;
class TaskHelper 
{
	/**
	 * 
	 * 针对一个任务，调用适当方法进行处理，处理后回写执行结果
	 * 任务种类 'checkout', 'update', 'delete', 'rsync'
	 * 
	*/
    public function run($task)
    {
    	//TODO 检查状态 'created', 'execute', 'success', 'failed'
    	//TODO 检查前置任务pre_task 的状态
        $func = '_run'.ucfirst($task->type);
        return $this->$func($task);
    }

    /**
     * 针对一个项目Project，获取最新版本库，放到指定目录，并将版本号回写到Project记录中。
     * 
    */
    private function _runCheckout($task)
    {

    }

    /**
     * 针对一个项目，将其发布代码目录更新到指定版本，并将版本号回写到Project记录中。
     * 
    */
    private function _runUpdate($task)
    {

    }


    /**
     * 针对一个项目，将其发布代码目录清空，并将Project记录中的版本号置空。
     * 
    */
    private function _runDelete($task)
    {

    }

    /**
     * 
     * 针对一个服务器，调用Rsync将项目
     * 
    */
    private function _runRsync($task)
    {

    }


}