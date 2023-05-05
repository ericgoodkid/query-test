<?php
namespace Tests\Feature\DataProvider;

use App\Constants\QueryConstants;

class QueryDataProvider 
{
  public static function GetResponseWithValidParams()
  {
    return [
      'Straight forward data' => [
        'Parameter' => [
          QueryConstants::QUERY_KEY => 'https://api.github.com/repos/hadley/ggplot2/commits',
        ],
        'For mocking http request' => [
          'name'  => 'John Doe',
          'age'   => '32',
          'email' => 'john@example.com'
        ],
        'Expected response' => [
          'data' => [
            QueryConstants::NORMAL_RESPONSE_KEY   => [
              'name'  => 'John Doe',
              'age'   => '32',
              'email' => 'john@example.com',
            ],
            QueryConstants::REVERSED_RESPONSE_KEY => [
              'liame' => 'moc.elpmaxe@nhoj',
              'ega'   => '23',
              'eman'  => 'eoD nhoJ'
            ],
          ]
        ]
      ],
      'With array data' => [
        'Parameter' => [
          QueryConstants::QUERY_KEY => 'https://api.github.com/repos/hadley/ggplot2/commits',
        ],
        'For mocking http request' => [
          'name'  => 'John Doe',
          'age'   => '32',
          'email' => 'john@example.com',
          'hobby' => [
            'eat',
            'run'
          ]
        ],
        'Expected response' => [
          'data' => [
            QueryConstants::NORMAL_RESPONSE_KEY   => [
              'name'  => 'John Doe',
              'age'   => '32',
              'email' => 'john@example.com',
              'hobby' => [
                'eat',
                'run'
              ]
            ],
            QueryConstants::REVERSED_RESPONSE_KEY => [
              'ybboh' => [
                'nur',
                'tae'
              ],
              'liame' => 'moc.elpmaxe@nhoj',
              'ega'   => '23',
              'eman'  => 'eoD nhoJ'
            ],
          ]
        ]
      ],
      'With complex array data' => [
        'Parameter' => [
          QueryConstants::QUERY_KEY => 'https://api.github.com/repos/hadley/ggplot2/commits',
        ],
        'For mocking http request' => [
          'name'  => 'John Doe',
          'age'   => '32',
          'email' => 'john@example.com',
          'hobby' => [
            'eat',
            'run',
            'perfume' => [
              'versace' => [
                'eros',
                'dylan blue'
              ]
            ]
          ]
        ],
        'Expected response' => [
          'data' => [
            QueryConstants::NORMAL_RESPONSE_KEY   => [
              'name'  => 'John Doe',
              'age'   => '32',
              'email' => 'john@example.com',
              'hobby' => [
                'eat',
                'run',
                'perfume' => [
                  'versace' => [
                    'eros',
                    'dylan blue'
                  ]
                ]
              ]
            ],
            QueryConstants::REVERSED_RESPONSE_KEY => [
              'ybboh' => [
                'emufrep' => [
                  'ecasrev' => [
                    'eulb nalyd',
                    'sore'
                  ]
                ],
                'nur',
                'tae'
              ],
              'liame' => 'moc.elpmaxe@nhoj',
              'ega'   => '23',
              'eman'  => 'eoD nhoJ'
            ],
          ]
        ]
      ]
    ];
  }

  public static function GetResponseWithInvalidParams()
  {
    return [
      'With no parameter' => [
        'Parameter' => [
        ],
        'Expected response' => [
          'key' => QueryConstants::QUERY_KEY,
          'message' => [
            QueryConstants::QUERY_KEY =>  [
              'The query field is required.'
            ]
          ]
        ]
      ],
      'With parameter is array' => [
        'Parameter' => [
          QueryConstants::QUERY_KEY => [
            123
          ],
        ],
        'Expected response' => [
          'key' => QueryConstants::QUERY_KEY,
          'message' => [
            QueryConstants::QUERY_KEY =>  [
              'The query must be a string.',
              'The query is not a valid URL.'
            ]
          ]
        ]
      ],
      'With parameter is not a valid url' => [
        'Parameter' => [
          QueryConstants::QUERY_KEY => 'hello.com'
        ],
        'Expected response' => [
          'key' => QueryConstants::QUERY_KEY,
          'message' => [
            QueryConstants::QUERY_KEY =>  [
              'The query is not a valid URL.'
            ]
          ]
        ]
      ]
    ];
  }
}