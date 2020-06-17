<?php

namespace Coreproc\LaravelDebugbarGitInfo;

use DebugBar\DataCollector\DataCollector;
use DebugBar\DataCollector\DataCollectorInterface;
use DebugBar\DataCollector\Renderable;

class GitInfoCollector extends DataCollector implements DataCollectorInterface, Renderable
{
    /**
     * {@inheritdoc}
     */
    public function collect()
    {
        return [
            'Branch' => $this->getCurrentBranch(),
            'Commit Date' => $this->getCurrentCommitDate(),
            'Commit Message' => $this->getCurrentCommitMessage(),
            'Hash' => $this->getCurrentCommitHash(),
            'Remote' => $this->getCurrentRemoteUrl(),
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'Git Info';
    }

    /**
     * {@inheritDoc}
     */
    public function getWidgets()
    {
        return [
            "Git Info" => [
                "icon" => "archive",
                "widget" => "PhpDebugBar.Widgets.VariableListWidget",
                "map" => "Git Info",
                "default" => "{}",
            ],
        ];
    }

    private function getCurrentBranch()
    {
        return exec('git rev-parse --abbrev-ref HEAD');
    }

    private function getCurrentCommitMessage()
    {
        return exec('git show -s --format=%s');
    }

    private function getCurrentCommitDate()
    {
        return exec('git log -1 --format=%cd');
    }

    private function getCurrentCommitHash()
    {
        return exec('git rev-parse HEAD');
    }

    private function getCurrentRemoteUrl()
    {
        return exec('git config --get remote.origin.url');
    }
}

