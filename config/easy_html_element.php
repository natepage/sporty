<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Encoding
     |--------------------------------------------------------------------------
     |
     | By default encoding is utf-8, if you want to change it you have to use
     | and encoding format supported by htmlspecialchars().
     |
     */
    'encoding' => 'utf-8',

    /*
     |--------------------------------------------------------------------------
     | Escaper class
     |--------------------------------------------------------------------------
     |
     | If you want to use your own escaper it must implement
     | NatePage\EasyHtmlElement\EscaperInterface.
     |
     */
    'escaper' => \NatePage\EasyHtmlElement\Escaper::class,

    /*
     |--------------------------------------------------------------------------
     | Branch Validator class
     |--------------------------------------------------------------------------
     |
     | If you want to use your own branch validator it must implement
     | NatePage\EasyHtmlElement\BranchValidatorInterface.
     |
     */
    'branch_validator' => \NatePage\EasyHtmlElement\BranchValidator::class,

    /*
     |--------------------------------------------------------------------------
     | Escaping strategies
     |--------------------------------------------------------------------------
     |
     | By default all escaping strategies are applied. If you want to disable a
     | strategy change its value to false.
     |
     */
    'escaping' => [
        'html' => true,
        'html_attr' => false,
        'css' => true,
        'js' => true,
        'url' => true
    ],

    /*
     |--------------------------------------------------------------------------
     | Elements map
     |--------------------------------------------------------------------------
     |
     | Define your elements here.
     |
     */
    'map' => [
        'notify' => ['type' => 'notify'],
        'ctrl' => ['type' => 'div', 'attr' => ['ng-controller' => '%name%']],
        //Layouts
        'row' => ['type' => 'div', 'attr' => ['layout' => 'row']],
        'rowCenter' => ['extends' => 'row', 'attr' => ['layout-align' => 'center center']],
        'column' => ['type' => 'div', 'attr' => ['layout' => 'column']],
        'columnCenter' => ['extends' => 'column', 'attr' => ['layout-align' => 'center center']],
        //Buttons
        'btn' => ['type' => 'md-button'],
        'iconBtn' => ['extends' => 'btn', 'attr' => ['class' => 'md-icon-button']],
        'toggleBtn' => [
            'extends' => 'iconBtn',
            'attr' => [
                'ng-click' => 'toggleSideNav(\'main-sidenav\')'
            ],
            'children' => [
                ['name' => 'ti', 'type' => 'i', 'attr' => ['class' => 'fa fa-bars']]
            ]
        ],
        'raisedBtn' => ['extends' => 'btn', 'attr' => ['class' => 'md-raised']],
        'primaryBtn' => ['extends' => 'btn', 'attr' => ['class' => 'md-primary']],
        'warnBtn' => ['extends' => 'btn', 'attr' => ['class' => 'md-warn']],
        'fabBtn' => ['extends' => 'btn', 'attr' => ['class' => 'md-fab', 'style' => 'position: fixed !important;']],
        'createFabBtn' => ['extends' => 'fabBtn', 'attr' => ['class' => 'md-fab-bottom-right'], 'children' => [
            ['name' => 'cfbt', 'type' => 'md-tooltip', 'text' => '%tooltip%', 'attr' => ['md-direction' => 'left']],
            ['name' => 'cfbi', 'type' => 'i', 'attr' => ['class' => 'fa fa-plus']]
        ]],
        'editFabBtn' => ['extends' => 'fabBtn', 'attr' => ['class' => 'md-fab-bottom-right'], 'children' => [
            ['name' => 'cfbt', 'type' => 'md-tooltip', 'text' => '%tooltip%', 'attr' => ['md-direction' => 'left']],
            ['name' => 'cfbi', 'type' => 'i', 'attr' => ['class' => 'fa fa-pencil']]
        ]],
        'editBtn' => ['extends' => ['iconBtn'], 'children' => [
            ['name' => 'ebi', 'type' => 'i', 'attr' => ['class' => 'fa fa-pencil']]
        ]],
        'deleteBtn' => ['extends' => ['iconBtn'], 'children' => [
            ['name' => 'dbi', 'type' => 'i', 'attr' => ['class' => 'fa fa-remove']]
        ]],
        //Toolbars
        'toolbar' => [
            'type' => 'div',
            'attr' => ['class' => 'md-toolbar-tools'],
            'parent' => ['name' => 'toolbar-container', 'type' => 'md-toolbar']
        ],
        'mainTB' => [
            'extends' => 'toolbar',
            'children' => [
                'settingsBtn',
                ['name' => 'mainTB-title', 'type' => 'h1', 'text' => '%title%']
            ]
        ],
        //SideNav
        'sidenav' => ['type' => 'md-sidenav'],
        'mainSD' => [
            'extends' => 'sidenav',
            'attr' => [
                'class' => 'md-sidenav-left',
                'md-component-id' => 'mainSD'
            ],
            'children' => [
                ['name' => 'mainSD-toolbar', 'extends' => 'toolbar', 'children' => [
                    ['name' => 'mainSD-tb-title', 'type' => 'h2', 'text' => '%title%']
                ]]
            ]
        ],
        //Cards
        'card' => ['type' => 'md-card'],
        'cardContent' => ['type' => 'md-card-content'],
        'cardActions' => ['type' => 'md-card-actions'],
        'userCard' => [
            'extends' => 'card',
            'attr' => [
                'flex' => '50', 'flex-md' => '75', 'flex-sm' => '85', 'flex-xs' => '100'
            ],
            'children' => [
                ['name' => 'tuc', 'type' => 'md-card-title', 'children' => [
                    ['name' => 'ttuc', 'type' => 'md-card-title-text', 'children' => [
                        ['name' => 'sttuc', 'type' => 'span', 'text' => '%title%', 'attr' => ['class' => 'md-headline']]
                    ]]
                ]]
            ]
        ],
        //Form & controls
        'form' => [
            'type' => 'form',
            'attr' => [
                'method' => 'POST',
                'role' => 'form'
            ]
        ],
        'input' => ['class' => \App\HtmlElement\InputWithError::class],
        'text' => ['extends' => 'input', 'attr' => ['type' => 'text']],
        'email' => ['extends' => 'input', 'attr' => ['type' => 'email']],
        'password' => ['extends' => 'input', 'attr' => ['type' => 'password']],
        'checkbox' => ['type' => 'md-checkbox'],
        'remember' => [
            'extends' => 'checkbox',
            'text' => 'Remember me',
            'attr' => [
                'ng-model' => 'remember',
                'ng-init' => 'remember=%checked%'
            ],
            'children' => [
                ['name' => 'hc', 'type' => 'input', 'attr' => [
                    'type' => 'checkbox',
                    'name' => 'remember',
                    'ng-checked' => 'remember',
                    'style' => 'display: none'
                ]]
            ]
        ],
        'hidden' => ['type' => 'input', 'attr' => ['type' => 'hidden']],
        'submit' => ['extends' => ['raisedBtn', 'primaryBtn'], 'attr' => ['type' => 'submit']],
        'back' => ['extends' => ['raisedBtn'], 'text' => 'Back', 'attr' => ['ng-click' => 'back()']],
        'files' => ['type' => 'lf-ng-md-file-input']
    ]
];
