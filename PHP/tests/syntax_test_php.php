// SYNTAX TEST "Packages/PHP/PHP.sublime-syntax"
<?php
namespace MyNamespace;
// <- keyword.other.namespace
//        ^^^^^^^^^^^ entity.name.namespace
//                   ^ punctuation.terminator.expression.php - entity.name.namespace

use MyNamespace\Foo;
// <- keyword.other.use
//^^^^^^^^^^^^^^^^^ meta.use
//  ^^^^^^^^^^^^^^^ meta.path
//  ^^^^^^^^^^^ support.other.namespace
//             ^ punctuation.separator.namespace
//              ^^^ support.class.php - constant.other - entity.name - support.function.php - support.other.namespace
//                 ^ punctuation.terminator.expression.php - meta.use

use /* Comment */ \MyNamespace\Bar;
// <- keyword.other.use
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.use
//  ^^^^^^^^^^^^^ comment.block
//                ^^^^^^^^^^^^^^^^ meta.path
//                ^ punctuation.separator.namespace
//                 ^^^^^^^^^^^ support.other.namespace
//                            ^ punctuation.separator.namespace
//                             ^^^ support.class.php - constant.other - entity.name - support.function.php - support.other.namespace
//                                ^ punctuation.terminator.expression.php - meta.use

use My\Full\Classname as /**/ Another # Foo baz
// <- keyword.other.use
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.use
//  ^^^^^^^^^^^^^^^^^ meta.path
//  ^^ support.other.namespace
//    ^ punctuation.separator.namespace
//     ^^^^ support.other.namespace
//         ^ punctuation.separator.namespace
//          ^^^^^^^^^ support.class.php - constant.other - entity.name - support.function.php - support.other.namespace
//                    ^^ keyword.other.use-as
//                       ^^^^ comment.block
//                            ^^^^^^^ entity.name.class
//                                    ^^^^^^^^^ comment.line
, My\Full\NSname;
//<- meta.use
//^^^^^^^^^^^^^^ meta.use
// <- punctuation.separator
//^^^^^^^^^^^^^^ meta.path
//^^ support.other.namespace
//  ^ punctuation.separator.namespace
//   ^^^^ support.other.namespace
//       ^ punctuation.separator.namespace
//        ^ - constant.other
//        ^^^^^^ support.class.php - constant.other - entity.name - support.function.php - support.other.namespace
//              ^ punctuation.terminator.expression.php - meta.use

use function /**/ some\nspace\fn_a;
// <- keyword.other.use
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.use
//  ^^^^^^^^ storage.type
//           ^^^^ comment.block
//                ^^^^^^^^^^^^^^^^ meta.path
//                ^^^^ support.other.namespace
//                    ^ punctuation.separator.namespace
//                      ^^^^^ support.other.namespace
//                           ^ punctuation.separator.namespace
//                            ^^^^ support.function.php - entity.name - constant.other - support.class.php - support.other.namespace
//                                ^ punctuation.terminator.expression.php - meta.use

use function some\nspace\fn_a /**/ as fn_b;
// <- keyword.other.use
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.use
//  ^^^^^^^^ storage.type
//           ^^^^^^^^^^^^^^^^ meta.path
//           ^^^^ support.other.namespace
//               ^ punctuation.separator.namespace
//                ^^^^^^ support.other.namespace
//                      ^ punctuation.separator.namespace
//                       ^^^^ support.function.php - entity.name - constant.other - support.class.php - support.other.namespace
//                            ^^^^ comment.block
//                                 ^^ keyword.other.use-as
//                                    ^^^^ entity.name.function
//                                        ^ punctuation.terminator.expression.php - meta.use

use const /**/ some\nspace\ConstValue;
// <- keyword.other.use
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.use
//  ^^^^^ storage.type
//        ^^^^ comment.block
//             ^^^^^^^^^^^^^^^^^^^^^^ meta.path
//             ^^^^ support.other.namespace
//                 ^ punctuation.separator.namespace
//                  ^^^^^^ support.other.namespace
//                         ^^^^^^^^^^ constant.other - support.function.php - entity.name - support.class.php - support.other.namespace
//                                   ^ punctuation.terminator.expression.php - meta.use

// Unfortunately we don't know if these identifiers are namespaces or classes
// so we can't disambiguate. Generally we are just going to assume an "as" is
// a class name so that the definition of the class can be found via the index.
use some\nspace\{ClassA, ClassB, ClassC as C};
// <- keyword.other.use
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.use
//  ^^^^^^^^^^^^ meta.path
//  ^^^^ support.other.namespace
//      ^ punctuation.separator.namespace
//       ^^^^^^ support.other.namespace
//             ^ punctuation.separator.namespace
//              ^ punctuation.section.block.begin
//               ^^^^^^ support.class.php - constant.other - entity.name - support.function.php - support.other.namespace
//                     ^ punctuation.separator
//                       ^^^^^^ support.class.php - constant.other - entity.name - support.function.php - support.other.namespace
//                             ^ punctuation.separator
//                               ^^^^^^ support.class.php - constant.other - entity.name - support.function.php - support.other.namespace
//                                      ^^ keyword.other.use-as
//                                         ^ entity.name.class
//                                          ^ punctuation.section.block.end
//                                           ^ punctuation.terminator.expression.php - meta.use

use function some\nspace\{fn_d, fn_e, fn_f as fn_g};
// <- keyword.other.use
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.use
//  ^^^^^^^^ storage.type.php
//           ^^^^^^^^^^^^ meta.path
//           ^^^^ support.other.namespace
//               ^ punctuation.separator.namespace
//                ^^^^^^ support.other.namespace
//                      ^ punctuation.separator.namespace
//                       ^ punctuation.section.block.begin
//                        ^^^^ support.function.php - constant.other - entity.name - support.class.php - support.other.namespace
//                            ^ punctuation.separator
//                              ^^^^ support.function.php - constant.other - entity.name - support.class.php - support.other.namespace
//                                  ^ punctuation.separator
//                                    ^^^^ support.function.php - constant.other - entity.name - support.class.php - support.other.namespace
//                                         ^^ keyword.other.use-as
//                                            ^^^^ entity.name.function
//                                                ^ punctuation.section.block.end
//                                                 ^ punctuation.terminator.expression.php - meta.use


use const some\nspace\{ConstA, ConstB AS ConstD, ConstC};
// <- keyword.other.use
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.use
//  ^^^^^ storage.type.php
//        ^^^^^^^^^^^^ meta.path
//        ^^^^ support.other.namespace
//            ^ punctuation.separator.namespace
//             ^^^^^^ support.other.namespace
//                   ^ punctuation.separator.namespace
//                    ^ punctuation.section.block.begin
//                     ^^^^^^ constant.other - support.function.php - entity.name - support.class.php - support.other.namespace
//                           ^ punctuation.separator
//                             ^^^^^^ constant.other - support.function.php - entity.name - support.class.php - support.other.namespace
//                                    ^^ keyword.other.use-as
//                                       ^^^^^^ constant.other - support.function.php - entity.name - support.class.php - support.other.namespace
//                                             ^ punctuation.separator
//                                               ^^^^^^ constant.other - support.function.php - entity.name - support.class.php - support.other.namespace
//                                                     ^ punctuation.section.block.end
//                                                      ^ punctuation.terminator.expression.php - meta.use


function a($a = array(),             $b = "hi") {};
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.function
//       ^ entity.name.function
//        ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.function.parameters meta.group
//        ^ punctuation.section.group.begin
//                                            ^ punctuation.section.group.end
function b($a = [],                  $b = "hi") {};
function c(array $a = array(),       $b = "hi") {};
//                    ^ meta.array.empty
//                          ^ punctuation.section.array.end
function d(array $a = [],            $b = "hi") {};
//                    ^ punctuation.section.array.begin
//                     ^ punctuation.section.array.end
function e(array $a = [1, 2, 3, 4],  $b = "hi") {};
//                    ^ punctuation.section.array.begin
//                               ^ punctuation.section.array.end
function f(array $a = null,          $b = "hi") {};
function i(
    $a,
//  ^^ variable.parameter
//    ^ punctuation.separator
    $b
//  ^^ variable.parameter
) {};


function array_values_from_keys($arr, $keys) {
    return array_map(fn($x) => $arr[$x], $keys, fn($x) => $arr[$x]);
//                   ^^ meta.function.arrow-function keyword.declaration.function
//                     ^ punctuation.section.group.begin
//                      ^^ variable.parameter
//                        ^ punctuation.section.group.end
//                          ^^ punctuation.definition.arrow-function.php
}

$fn = fn($x) => fn($y) => $x * $y + $z;
//    ^^ meta.function.arrow-function keyword.declaration.function
//      ^ punctuation.section.group.begin
//       ^^ variable.parameter
//         ^ punctuation.section.group.end
//           ^^ punctuation.definition.arrow-function.php
//              ^^ meta.function.arrow-function keyword.declaration.function
//                ^ punctuation.section.group.begin
//                 ^^ variable.parameter
//                   ^ punctuation.section.group.end
//                     ^^ punctuation.definition.arrow-function.php

$var = fn($x)
//     ^^ meta.function.arrow-function.php - meta.function-call
//     ^^ keyword.declaration.function
   => $x * 2;
// ^^ punctuation.definition.arrow-function

$var = fn($x)
//     ^^ meta.function-call - meta.function.arrow-function.php
//     ^^ - keyword.declaration.function
;

$var = function(array $ar=array(), ClassName $cls) use ($var1, $var2) {
//     ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.function
//     ^^^^^^^^ meta.function.closure
//             ^^ meta.function.parameters meta.group
//             ^ punctuation.section.group.begin
//              ^^^^^ storage.type
//                    ^^^ variable.parameter
//                       ^ keyword.operator.assignment
//                        ^^^^^^^ meta.array.empty
//                               ^ punctuation.separator
//                                 ^^^^^^^^^ meta.path
//                                 ^^^^^^^^^ support.class
//                                           ^^^^ variable.parameter
//                                               ^ punctuation.section.group.end
//                                                 ^^^^^^^^^^^^^^^^^^ meta.function.closure.use
//                                                                    ^ meta.block punctuation.section.block.begin

};
// <- meta.function meta.block punctuation.section.block.end

function bye(): never {
//              ^^^^^ storage.type
  exit();
}

function foo(?stinrg ...$args) {}
//           ^ storage.type.nullable
//            ^^^^^^ support.class
//                   ^^^ keyword.operator.spread
//                      ^^^^^ variable.parameter

$a = $b ? $c::MY_CONST : $d * 5;
//      ^ keyword.operator.ternary
//        ^^ variable.other
//          ^^ punctuation.accessor.double-colon
//            ^^^^^^^^ constant.other.class
//                     ^ keyword.operator.ternary
//                          ^ keyword.operator.arithmetic

$a = $b ? : $c::MY_CONST;
//      ^ keyword.operator.ternary
//        ^ keyword.operator.ternary
//          ^^ variable.other
//            ^^ punctuation.accessor.double-colon
//              ^^^^^^^^ constant.other.class

$arr3 = array('a', ...$arr1, 'b', ...$arr2, 'c',);
//      ^^^^^ support.function.construct
//           ^ punctuation.section.array.begin
//                 ^^^ keyword.operator.spread
//                    ^^^^^ variable.other
//                                ^^^ keyword.operator.spread
//                                             ^ punctuation.separator.comma
//                                              ^ punctuation.section.array.end

$arr4 = ['a', ...$arr1, 'b', ...$arr2, 'c',];
//      ^ punctuation.section.array.begin
//          ^ punctuation.separator.comma
//            ^^^ keyword.operator.spread
//               ^^^^^ variable.other
//                           ^^^ keyword.operator.spread
//                                        ^ punctuation.separator.comma
//                                         ^ punctuation.section.array.end

$array = [   ];
//       ^ meta.array.empty.php punctuation.section.array.begin.php
//           ^ meta.array.empty.php punctuation.section.array.end.php
   [];
// ^ meta.array.empty.php punctuation.section.array.begin.php
//  ^ meta.array.empty.php punctuation.section.array.end.php

$array = [
//       ^ meta.array.php punctuation.section.array.begin.php
    'abc'   => $arr['key']['key2']
//                 ^ meta.item-access punctuation.section.brackets.begin.php
//                  ^^^^^ meta.item-access.arguments
//                       ^ meta.item-access punctuation.section.brackets.end.php
//                        ^ meta.item-access.php punctuation.section.brackets.begin.php
//                         ^^^^^^ meta.item-access.arguments
//                               ^ meta.item-access punctuation.section.brackets.end.php
];

$array[  ];
//    ^^^^ meta.item-access
//    ^ punctuation.section.brackets.begin.php
//       ^ punctuation.section.brackets.end.php

$var?->meth()[10];
//  ^ punctuation.accessor.nullsafe
//   ^^ punctuation.accessor.arrow
//           ^^^^ meta.item-access
//           ^ punctuation.section.brackets.begin
//              ^ punctuation.section.brackets.end

  # [WithoutArgument]
//^^^^^^^^^^^^^^^^^^^ comment
  ##[WithoutArgument]
//^^^^^^^^^^^^^^^^^^^ comment

  #[WithoutArgument]
//^^^^^^^^^^^^^^^^^^ meta.attribute - comment
//^^ punctuation.definition.attribute.begin
//  ^^^^^^^^^^^^^^^ meta.path
//                 ^ punctuation.definition.attribute.end
  #[WithoutArgument()]
//^^^^^^^^^^^^^^^^^^^^ meta.attribute
//^^ punctuation.definition.attribute.begin
//  ^^^^^^^^^^^^^^^ meta.path
//                 ^^ meta.function-call
//                   ^ punctuation.definition.attribute.end
  #[SingleArgument(0)]
//^^^^^^^^^^^^^^^^^^^^ meta.attribute
//^^ punctuation.definition.attribute.begin
//  ^^^^^^^^^^^^^^ meta.path
//                ^ punctuation.section.group.begin
//                 ^ constant.numeric
//                  ^ punctuation.section.group.end
//                   ^ punctuation.definition.attribute.end
  #[FewArguments('Hello', 'World')]
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.attribute
//^^ punctuation.definition.attribute.begin
//  ^^^^^^^^^^^^ meta.path
//              ^ punctuation.section.group.begin
//               ^^^^^^^ string.quoted
//                      ^ punctuation.separator
//                        ^^^^^^^ string.quoted
//                               ^ punctuation.section.group.end
//                                ^ punctuation.definition.attribute.end
  #[FewArguments(PDO::class, PHP_VERSION_ID), SecondOne(0)]
//^^ punctuation.definition.attribute.begin
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.attribute
//^^ punctuation.definition.attribute.begin
//  ^^^^^^^^^^^^ meta.path
//              ^ punctuation.section.group.begin
//               ^^^ support.class
//                  ^^ punctuation.accessor
//                         ^ punctuation.separator
//                           ^^^^^^^^^^^^^^ support.constant
//                                         ^ punctuation.section.group.end
//                                             ^^^^^^^^ support.class
//                                                     ^ punctuation.section.group.begin
//                                                      ^ constant.numeric
//                                                       ^ punctuation.section.group.end
//                                                        ^ punctuation.definition.attribute.end
  #[\My\Attributes\FewArguments("foo", "bar")]
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.attribute
//^^ punctuation.definition.attribute.begin
//  ^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.path
//                             ^ punctuation.section.group.begin
//                              ^^^^^ string.quoted
//                                   ^ punctuation.separator
//                                     ^^^^^ string.quoted
//                                          ^ punctuation.section.group.end
//                                           ^ punctuation.definition.attribute.end
/** docblock */
// <- comment.block
  #[BitShiftExample(4 >> 1, 4 << 1)]
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.attribute
//^^ punctuation.definition.attribute.begin
//                    ^^ keyword.operator.bitwise
//                            ^^ keyword.operator.bitwise
//                                 ^ punctuation.definition.attribute.end
function foo() {}
// <- keyword.declaration.function

  #[ExampleAttribute]
//^^^^^^^^^^^^^^^^^^^ meta.attribute
//^^ punctuation.definition.attribute.begin
//  ^^^^^^^^^^^^^^^^ meta.path
//                  ^ punctuation.definition.attribute.end
class Foo
{
    #[ExampleAttribute]
//  ^^^^^^^^^^^^^^^^^^^ meta.attribute
//  ^^ punctuation.definition.attribute.begin
//    ^^^^^^^^^^^^^^^^ meta.path
//                    ^ punctuation.definition.attribute.end
    public const FOO = 'foo';

    #[ExampleAttribute]
//  ^^^^^^^^^^^^^^^^^^^ meta.attribute
//  ^^ punctuation.definition.attribute.begin
//    ^^^^^^^^^^^^^^^^ meta.path
//                    ^ punctuation.definition.attribute.end
    #[ORM\Column("string", ORM\Column::UNIQUE)]
//  ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.attribute
//  ^^ punctuation.definition.attribute.begin
//    ^^^^^^^^^^ meta.path
//              ^ punctuation.section.group.begin
//               ^^^^^^^^ string.quoted.double
//                       ^ punctuation.separator
//                         ^^^^^^^^^^ meta.path
//                                   ^^ punctuation.accessor.double-colon
//                                     ^^^^^^ constant.other.class
//                                           ^ punctuation.section.group.end
//                                            ^ punctuation.definition.attribute.end
    #[Assert\Email(["message" => "The email '{{ value }}' is not a valid email."])]
//  ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.attribute
//  ^^ punctuation.definition.attribute.begin
//    ^^^^^^^^^^^^ meta.path
//                ^ punctuation.section.group.begin
//                 ^ punctuation.section.array.begin
//                  ^^^^^^^^^ string.quoted.double
//                            ^^ keyword.operator.key
//                               ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ string.quoted.double
//                                                                              ^ punctuation.section.array.end
//                                                                               ^ punctuation.section.group.end
//                                                                                ^ punctuation.definition.attribute.end
    public $x;

    #[ExampleAttribute] // comment
//  ^^^^^^^^^^^^^^^^^^^ meta.attribute
//  ^^ punctuation.definition.attribute.begin
//    ^^^^^^^^^^^^^^^^ meta.path
//                    ^ punctuation.definition.attribute.end
//                      ^^^^^^^^^^ comment
    public function foo(#[ExampleAttribute] \Foo\Bar $bar) { }
//                      ^^^^^^^^^^^^^^^^^^^ meta.attribute
//                      ^^ punctuation.definition.attribute.begin
//                        ^^^^^^^^^^^^^^^^ meta.path
//                                        ^ punctuation.definition.attribute.end
//                                          ^^^^^^^^ meta.path
//                                                   ^^^^ variable.parameter

    #[Route("/api/posts/{id}", methods: ["GET", "HEAD"])]
//  ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.attribute
//  ^^ punctuation.definition.attribute.begin
//    ^^^^^ meta.path
//         ^ punctuation.section.group.begin
//                           ^ punctuation.separator
//                             ^^^^^^^ variable.parameter.named
//                                    ^ punctuation.definition.variable
//                                                     ^ punctuation.section.group.end
//                                                      ^ punctuation.definition.attribute.end
    public function show(int $id) { }
}

$object = new #[ExampleAttribute] class () { };
//            ^^^^^^^^^^^^^^^^^^^ meta.attribute
//            ^^ punctuation.definition.attribute.begin
//              ^^^^^^^^^^^^^^^^ meta.path
//                              ^ punctuation.definition.attribute.end
//                                ^^^^^ storage.type

$f2 = #[ExampleAttribute] function () { };
//    ^^^^^^^^^^^^^^^^^^^ meta.attribute
//    ^^ punctuation.definition.attribute.begin
//      ^^^^^^^^^^^^^^^^ meta.path
//                      ^ punctuation.definition.attribute.end
//                        ^^^^^^^^ keyword.declaration.function

$f3 = #[ExampleAttribute] fn () => 1;
//    ^^^^^^^^^^^^^^^^^^^ meta.attribute
//    ^^ punctuation.definition.attribute.begin
//      ^^^^^^^^^^^^^^^^ meta.path
//                      ^ punctuation.definition.attribute.end
//                        ^^ keyword.declaration.function
//                              ^^ punctuation.definition.arrow-function

/**
   No longer a phpdoc comment since no leading *
 * @return
//   ^ comment.block - keyword.other.phpdoc
 */
// ^ source - comment.block

/**
    *
//  ^ text.html.basic meta.embedded.block.php source.php comment.block.documentation.phpdoc.php punctuation.definition.comment.php
*/

/** @var Properties: class properties. */
//  ^ keyword.other.phpdoc
//       ^ - keyword.other.phpdoc

/** @var @var Properties: class properties. */
//  ^ keyword.other.phpdoc
//       ^ - keyword.other.phpdoc

/**@var Properties: class properties. */
// ^^^^ - keyword.other.phpdoc

/** @var@var Properties: class properties. */
//  ^^^^^^^^ - keyword.other.phpdoc

/* No phpdoc highlight since there are not two * after the opening /
 * @return
//   ^ comment.block - keyword.other.phpdoc
 */

/**
 * @api Methods: declares that elements are suitable for consumption by third parties.
//  ^ keyword.other.phpdoc
 */

/**
 * @author Any: documents the author of the associated element.
//  ^ keyword.other.phpdoc
 */

/**
 * @category File, Class: groups a series of packages together.
//  ^ keyword.other.phpdoc
 */

/**
 * @copyright Any: documents the copyright information for the associated element.
//  ^ keyword.other.phpdoc
 */

/**
 * @deprecated Any: indicates that the associated element is deprecated and can be removed in a future version.
//  ^ keyword.other.phpdoc
 */

/**
 * @example Any: shows the code of a specified example file or, optionally, just a portion of it.
//  ^ keyword.other.phpdoc
 */

/**
 * @filesource File: includes the source of the current file for use in the output.
//  ^ keyword.other.phpdoc
 */

/**
 * @global Variable: informs phpDocumentor of a global variable or its usage.
//  ^ keyword.other.phpdoc
 */

/**
 * @ignore Any: tells phpDocumentor that the associated element is not to be included in the documentation.
//  ^ keyword.other.phpdoc
 */

/**
 * @internal Any: denotes that the associated elements is internal to this application or library and hides it by default.
//  ^ keyword.other.phpdoc
 */

/**
 * @license File, Class: indicates which license is applicable for the associated element.
//  ^ keyword.other.phpdoc
 */

/**
 * @link Any: indicates a relation between the associated element and a page of a website.
//  ^ keyword.other.phpdoc
 */

/**
 * @method Class: allows a class to know which ‘magic’ methods are callable.
//  ^ keyword.other.phpdoc
 */

/**
 * @package File, Class: categorizes the associated element into a logical grouping or subdivision.
//  ^ keyword.other.phpdoc
 */

/**
 * @param Method, Function: documents a single argument of a function or method.
//  ^ keyword.other.phpdoc
 */

/**
 * @property Class: allows a class to know which ‘magic’ properties are present.
//  ^ keyword.other.phpdoc
 */

/**
 * @property-read Class: allows a class to know which ‘magic’ properties are present that are read-only.
//  ^^^^^^^^^^^^^ keyword.other.phpdoc
 */

/**
 * @property-write Class: allows a class to know which ‘magic’ properties are present that are write-only.
//  ^^^^^^^^^^^^^^ keyword.other.phpdoc
 */

/**
 * @return Method, Function: documents the return value of functions or methods.
//  ^ keyword.other.phpdoc
 */

/**
 * @see Any: indicates a reference from the associated element to a website or other elements.
//  ^ keyword.other.phpdoc
 */

/**
 * @since Any: indicates at which version the associated element became available.
//  ^ keyword.other.phpdoc
 */

/**
 * @source Any, except File: shows the source code of the associated element.
//  ^ keyword.other.phpdoc
 */

/**
 * @subpackage File, Class: categorizes the associated element into a logical grouping or subdivision.
//  ^ keyword.other.phpdoc
 */

/**
 * @throws Method, Function: indicates whether the associated element could throw a specific type of exception.
//  ^ keyword.other.phpdoc
 */

/**
 * @todo Any: indicates whether any development activity should still be executed on the associated element.
//  ^ keyword.other.phpdoc
 */

/**
 * @uses Any: indicates a reference to (and from) a single associated element.
//  ^ keyword.other.phpdoc
 */

/**
 * @var Properties: class properties.
//  ^ keyword.other.phpdoc
 */

/**
 * @version Any: indicates the current version of Structural Elements.
//  ^ keyword.other.phpdoc
 */

/**
 * @after
//  ^ keyword.other.phpunit
 */

/**
 * @afterClass
//  ^ keyword.other.phpunit
 */

/**
 * @backupGlobals
//  ^ keyword.other.phpunit
 */

/**
 * @backupStaticAttributes
//  ^ keyword.other.phpunit
 */

/**
 * @before
//  ^ keyword.other.phpunit
 */

/**
 * @beforeClass
//  ^ keyword.other.phpunit
 */

/**
 * @codeCoverageIgnore
//  ^ keyword.other.phpunit
 */

/**
 * @covers
//  ^ keyword.other.phpunit
 */

/**
 * @coversDefaultClass
//  ^ keyword.other.phpunit
 */

/**
 * @coversNothing
//  ^ keyword.other.phpunit
 */

/**
 * @dataProvider
//  ^ keyword.other.phpunit
 */

/**
 * @depends
//  ^ keyword.other.phpunit
 */

/**
 * @doesNotPerformAssertions
//  ^ keyword.other.phpunit
 */

/**
 * @expectedException
//  ^ keyword.other.phpunit
 */

/**
 * @expectedExceptionCode
//  ^ keyword.other.phpunit
 */

/**
 * @expectedExceptionMessage
//  ^ keyword.other.phpunit
 */

/**
 * @expectedExceptionMessageRegExp
//  ^ keyword.other.phpunit
 */

/**
 * @group
//  ^ keyword.other.phpunit
 */

/**
 * @large
//  ^ keyword.other.phpunit
 */

/**
 * @medium
//  ^ keyword.other.phpunit
 */

/**
 * @preserveGlobalState
//  ^ keyword.other.phpunit
 */

/**
 * @requires
//  ^ keyword.other.phpunit
 */

/**
 * @runTestsInSeparateProcesses
//  ^ keyword.other.phpunit
 */

/**
 * @runInSeparateProcess
//  ^ keyword.other.phpunit
 */

/**
 * @small
//  ^ keyword.other.phpunit
 */

/**
 * @test
//  ^ keyword.other.phpunit
 */

/**
 * @testdox
//  ^ keyword.other.phpunit
 */

/**
 * @testWith
//  ^ keyword.other.phpunit
 */

/**
 * @ticket
//  ^ keyword.other.phpunit
 */

/**
 * @param @param
// ^^ keyword.other.phpdoc
//        ^^ - keyword.other.phpdoc
 */

/**
 * @param@param
// ^^^^^^^^^^^^ - keyword.other.phpdoc
 */

/**
 *@param
// ^ - keyword.other.phpdoc
 */

/**
 * PHP comment from issue #1378
 *
 * @see
 * @author
 * @package
 * @version
 NOTE: Modified */
//^^^^^^^^^^^^^^^^ comment.block - comment.block.documentation
//              ^^ punctuation.definition.comment.end
//                ^ - comment

enum Suit {
// ^ keyword.declaration.enum
//   ^^^^ entity.name.enum
    case Hearts;
//  ^^^^ keyword.control
//       ^^^^^^ constant.other
    case Diamonds;
    case Clubs;
    case Spades;
}

enum Suit: string implements Colorful {
// ^ keyword.declaration.enum
//   ^^^^ entity.name.enum
//       ^ punctuation.separator
//         ^^^^^^ storage.type
//                ^^^^^^^^^^ storage.modifier.implements
//                           ^^^^^^^^ entity.other.inherited-class
    case Hearts = 'H';
//  ^^^^ keyword.control
//       ^^^^^^ constant.other
//              ^ keyword.operator.assignment
//                ^^^ string.quoted.single
    case Diamonds = 'D';
    case Clubs = 'C';
    case Spades = 'S';

    public function color(): string {
//  ^^^^^^ storage.modifier
//         ^^^^^^^^ keyword.declaration.function
//                  ^^^^^ entity.name.function
//                         ^ punctuation.separator
//                           ^^^^^^ storage.type.php
        return match($this) {
            Suit::Hearts, Suit::Diamonds => 'Red',
            Suit::Clubs, Suit::Spaces => 'Black',
        };
    }
}

    class Test1 extends stdClass implements Countable {}
//  ^ keyword.declaration.class
//        ^ entity.name.class.php
//              ^ storage.modifier.extends.php
//                      ^^^^^^^^ meta.path
//                       ^ entity.other.inherited-class.php
//                               ^ storage.modifier.implements.php
//                                          ^^^^^^^^^ meta.path
//                                           ^ entity.other.inherited-class.php

class ClassName extends /* */ \MyNamespace\Foo implements \MyNamespace\Baz {
//    ^ entity.name.class
//              ^ storage.modifier
//                      ^ comment.block
//                            ^^^^^^^^^^^^^^^^ meta.path
//                            ^^^^^^^^^^^^^^^^ entity.other.inherited-class
//                            ^ punctuation.separator.namespace
//                                        ^ punctuation.separator.namespace
//                                             ^ storage.modifier
//                                                        ^^^^^^^^^^^^^^^^ meta.path
//                                                        ^^^^^^^^^^^^^^^^ entity.other.inherited-class
//                                                        ^ punctuation.separator.namespace
//                                                                    ^ punctuation.separator.namespace

    public function __construct(private \MyNamespace\Foo $val = DEFAULT_VALUE) {
//                  ^^^^^^^^^^^ entity.name.function support.function.magic
//                             ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.function.parameters
//                              ^^^^^^^ storage.modifier
//                                      ^^^^^^^^^^^^^^^^ meta.path
//                                                       ^^^^ variable.parameter
//                                                            ^ keyword.operator.assignment
//                                                              ^^^^^^^^^^^^^ constant.other
    }
}

interface MyInter {}
// <- keyword.declaration.interface
//        ^ entity.name.interface

interface MyInter2 extends \MyNamespace\Foo, /**/ \ArrayAccess {
// <- keyword.declaration.interface
//        ^ entity.name.interface
//                 ^ storage.modifier
//                         ^^^^^^^^^^^^^^^^ meta.path
//                         ^^^^^^^^^^^^^^^^ entity.other.inherited-class
//                         ^ punctuation.separator.namespace
//                                     ^ punctuation.separator.namespace
//                                         ^ punctuation.separator
//                                           ^ comment.block
//                                                ^ punctuation.separator.namespace
//                                                ^^^^^^^^^^^^ meta.path
//                                                ^^^^^^^^^^^^ entity.other.inherited-class
}

if ($foo instanceof \Mynamespace\ClassName) {
//  ^ variable.other
//       ^ keyword.operator
//                  ^^^^^^^^^^^^^^^^^^^^^^ meta.path
//                  ^ punctuation.separator.namespace
//                   ^ support.other.namespace
//                              ^ punctuation.separator.namespace
//                               ^^^^^^^^^ support.class
}

$var = new \MyNamespce\ClassName();
// <- variable.other
//     ^ keyword.other
//         ^^^^^^^^^^^^^^^^^^^^^ meta.path
//         ^ punctuation.separator.namespace
//          ^ support.other.namespace
//                    ^ punctuation.separator.namespace
//                     ^ support.class

\MyNamespace\Foo::BAR;
// <- punctuation.separator.namespace
 // <- support.other.namespace
//^^^^^^^^^^^^^^ meta.path
//          ^ punctuation.separator.namespace
//           ^ support.class
//              ^^ punctuation.accessor
//                ^^^ constant.other

\MyNamespace\Foo::bar();
// <- punctuation.separator.namespace
 // <- support.other.namespace
//^^^^^^^^^^^^^^ meta.path
//          ^ punctuation.separator.namespace
//           ^^^ support.class
//              ^^ punctuation.accessor
//                ^^^^^ meta.function-call
//                ^^^ variable.function
//                   ^^ meta.group
//                   ^ punctuation.section.group.begin
//                    ^ punctuation.section.group.end

\MyNamespace\Foo();
//^^^^^^^^^^^^^^^^ meta.function-call
// <- punctuation.separator.namespace
 // <- support.other.namespace
//^^^^^^^^^^^^^^ meta.path
//          ^ punctuation.separator.namespace
//           ^^^ variable.function
//              ^^ meta.group
//              ^ punctuation.section.group.begin
//               ^ punctuation.section.group.end

\MyNamespace\Foo;
// <- punctuation.separator.namespace
 // <- support.other.namespace
//^^^^^^^^^^^^^^ meta.path
//          ^ punctuation.separator.namespace
//           ^ constant.other

func_call(true, 1, "string");
//^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.function-call
//                          ^ - meta.function-call
//^^^^^^^ variable.function
//       ^^^^^^^^^^^^^^^^^^^ meta.group
//                          ^ - meta.group
//       ^ punctuation.section.group.begin
//                         ^ punctuation.section.group.end
//        ^^^^ constant.language
//            ^ punctuation.separator.comma
//              ^ meta.number.integer.decimal constant.numeric.value
//               ^ punctuation.separator.comma
//                 ^^^^^^^^ string.quoted.double

$object->method(func_call());
//     ^^^^^^^^^^^^^^^^^^^^^ meta.function-call
//       ^^^^^^ variable.function
//             ^^^^^^^^^^^^^ meta.group
//              ^^^^^^^^^^^ meta.function-call meta.function-call
//              ^^^^^^^^^ variable.function
//                       ^^ meta.group meta.group

$object?->property::method();
//     ^ punctuation.accessor.nullsafe
//      ^^ punctuation.accessor.arrow
//                ^^ punctuation.accessor.double-colon
//                  ^^^^^^ meta.function-call.static variable.function
//                        ^^ meta.group

$country = $session?->user?->getAddress()?->country;
//                 ^ punctuation.accessor.nullsafe
//                  ^^ punctuation.accessor.arrow
//                        ^ punctuation.accessor.nullsafe
//                         ^^ punctuation.accessor.arrow
//                                       ^ punctuation.accessor.nullsafe
//                                        ^^ punctuation.accessor.arrow

null?->foo(bar())->baz();
//  ^ punctuation.accessor.nullsafe
//   ^^ punctuation.accessor.arrow

strval($foo);
//^^^^^^^^^^ meta.function-call
//^^^^ support.function.var - variable.function
//    ^^^^^^ meta.group

array_slice($array, $offset, $length, preserve_keys: true);
//                                    ^^^^^^^^^^^^^ variable.parameter.named
//                                                 ^ punctuation.definition.variable
//                                                   ^^^^ constant.language

$test = new Test1;
//      ^ keyword.other.new.php
//          ^^^^^ meta.path
//          ^ support.class.php

$anon = new class{};
//      ^ keyword.other.new.php
//          ^ keyword.declaration.class
//               ^^ meta.class.php
//               ^^ meta.block.php
//               ^ punctuation.section.block.begin.php - meta.class meta.class
//                ^ punctuation.section.block.end.php

$anon = new class};
//      ^ keyword.other.new.php
//          ^ keyword.declaration.class
//               ^ punctuation.section.block.end.php - meta.class - meta.block

$anon = new class($param1, $param2) extends Test1 implements Countable {};
//      ^ keyword.other.new.php
//          ^ keyword.declaration.class
//               ^^^^^^^^^^^^^^^^^^ meta.function-call.php
//               ^ punctuation.section.group.begin.php
//                ^ variable.other.php
//                       ^ punctuation.separator.comma
//                         ^ variable.other.php
//                                ^ punctuation.section.group.end.php
//                                  ^ storage.modifier.extends.php
//                                          ^^^^^ meta.path
//                                           ^ entity.other.inherited-class.php
//                                                ^ storage.modifier.implements.php
//                                                           ^^^^^^^^^ meta.path
//                                                           ^ entity.other.inherited-class.php
//                                                                     ^^ meta.class.php
//                                                                     ^^ meta.block.php

$user_1 = new User("John", "a@b.com");
//                       ^ punctuation.separator.comma

    function noReturnType(array $param1, int $param2) {}
//  ^ keyword.declaration.function
//           ^ entity.name.function.php
//                       ^ punctuation.section.group.begin.php
//                        ^ meta.function.parameters
//                              ^ punctuation.definition.variable.php
//                                       ^ meta.function.parameters
//                                           ^ punctuation.definition.variable.php
//                                                  ^ punctuation.section.group.end.php
//                                                    ^^ meta.block.php
//                                                    ^ punctuation.section.block.begin.php
//                                                     ^ punctuation.section.block.end.php

    function scalarReturnType($param1): bool {}
//  ^ keyword.declaration.function
//           ^ entity.name.function.php
//                           ^ punctuation.section.group.begin.php
//                                   ^ punctuation.section.group.end.php
//                                      ^ storage.type.php

    function classReturnType($param1): stringSpace\Test1 {}
//  ^ keyword.declaration.function
//           ^ entity.name.function.php
//                          ^ punctuation.section.group.begin.php
//                                  ^ punctuation.section.group.end.php
//                                     ^^^^^^^^^^^^^^^^^ meta.path
//                                     ^ support.other.namespace.php
//                                                 ^ support.class.php

    function nullableReturnType(?int $param1): ?bool {}
//  ^ keyword.declaration.function
//           ^ entity.name.function.php
//                             ^ punctuation.section.group.begin.php
//                              ^ storage.type.nullable.php
//                               ^ meta.function.parameters
//                                          ^ punctuation.section.group.end.php
//                                             ^ storage.type.nullable.php
//                                              ^ storage.type.php

    function nullableObjectReturnType(?int $param1): ?object {}
//  ^ keyword.declaration.function
//           ^ entity.name.function.php
//                                   ^ punctuation.section.group.begin.php
//                                    ^ storage.type.nullable.php
//                                     ^ meta.function.parameters
//                                                ^ punctuation.section.group.end.php
//                                                   ^ storage.type.nullable.php
//                                                    ^ storage.type.php

    function intersectionTypeFunction(?int $param1): Interface1&Interface2 {}
//  ^ keyword.declaration.function
//           ^ entity.name.function
//                                   ^ punctuation.section.group.begin
//                                    ^ storage.type.nullable
//                                     ^ meta.function.parameters
//                                                ^ punctuation.section.group.end
//                                                   ^^^^^^^^^^ support.class
//                                                             ^ punctuation.separator.type.intersection
//                                                              ^^^^^^^^^^ support.class

    function unionTypeFunction(
//  ^ keyword.declaration.function
//           ^ entity.name.function.php
        Foo|\Foo\Bar|?int $param1,
//      ^^^ support.class
//         ^ punctuation.separator.type
//          ^ punctuation.separator.namespace
//           ^^^ support.other.namespace
//              ^ punctuation.separator.namespace
//               ^^^ support.class
//                  ^ punctuation.separator.type
//                   ^ storage.type.nullable
//                    ^^^ storage.type
//                        ^ punctuation.definition.variable
//                         ^^^^^^ variable.parameter
        Foo|\Foo\Bar|?int $param2,
//      ^^^ support.class
//         ^ punctuation.separator.type
//          ^ punctuation.separator.namespace
//           ^^^ support.other.namespace
//              ^ punctuation.separator.namespace
//               ^^^ support.class
//                  ^ punctuation.separator.type
//                   ^ storage.type.nullable
//                    ^^^ storage.type
//                        ^ punctuation.definition.variable
//                         ^^^^^^ variable.parameter
        string $param3,
//      ^^^^^^ storage.type
//             ^ punctuation.definition.variable
//              ^^^^^^ variable.parameter
        $param4
//      ^ punctuation.definition.variable
//       ^^^^^^ variable.parameter
    ): Foo|\Foo\Bar|?int|static {}
//     ^^^ support.class
//        ^ punctuation.separator.type
//         ^ punctuation.separator.namespace
//          ^^^ support.other.namespace
//             ^ punctuation.separator.namespace
//              ^^^ support.class
//                 ^ punctuation.separator.type
//                  ^ storage.type.nullable
//                   ^^^ storage.type
//                      ^ punctuation.separator.type
//                       ^^^^^^ storage.type

$test = "\0 \12 \345g \x0f \u{a} \u{9999} \u{999}";
//       ^^ constant.character.escape.octal.php
//          ^^^ constant.character.escape.octal.php
//              ^^^^ constant.character.escape.octal.php
//                  ^ - constant.character.escape
//                    ^^^^ constant.character.escape.hex.php
//                         ^^^^^ constant.character.escape.unicodepoint.php
//                               ^^^^^^^^ constant.character.escape.unicodepoint.php
//

"$a then $b->c or ${d} with {$e} then $f[0] followed by $g[$h] or $i[k] and finally {$l . $m->n . o}"
 // <- variable.other punctuation.definition.variable
//^ variable.other
//       ^^ variable.other
//       ^ punctuation.definition.variable
//         ^^ punctuation.accessor
//           ^ variable.other.member
//                ^^^^ variable.other
//                ^^ punctuation.definition.variable
//                   ^ punctuation.definition.variable
//                          ^ punctuation.definition.expression
//                           ^^ variable.other
//                           ^ punctuation.definition.variable
//                             ^ punctuation.definition.expression
//                                    ^^ variable.other
//                                    ^ punctuation.definition.variable
//                                      ^ punctuation.section.brackets.begin
//                                       ^ meta.number.integer.decimal constant.numeric.value
//                                        ^ punctuation.section.brackets.end
//                                                      ^^ variable.other
//                                                      ^ punctuation.definition.variable
//                                                        ^ punctuation.section.brackets.begin
//                                                         ^^ variable.other
//                                                         ^ punctuation.definition.variable
//                                                           ^ punctuation.section.brackets.end
//                                                                ^^ variable.other
//                                                                ^ punctuation.definition.variable
//                                                                  ^ punctuation.section.brackets.begin
//                                                                   ^ constant.other
//                                                                    ^ punctuation.section.brackets.end
//                                                                                  ^ punctuation.definition.expression
//                                                                                   ^^ variable.other
//                                                                                   ^ punctuation.definition.variable
//                                                                                      ^ keyword.operator
//                                                                                        ^^ variable.other
//                                                                                        ^ punctuation.definition.variable
//                                                                                          ^^ punctuation.accessor
//                                                                                            ^ variable.other.member
//                                                                                              ^ keyword.operator
//                                                                                                ^ constant.other

`$a then $b->c or ${d} with {$e} then $f[0] followed by $g[$h] or $i[k] and finally {$l . $m->n . o}`
 // <- variable.other punctuation.definition.variable
//^ variable.other
//       ^^ variable.other
//       ^ punctuation.definition.variable
//         ^^ punctuation.accessor
//           ^ variable.other.member
//                ^^^^ variable.other
//                ^^ punctuation.definition.variable
//                   ^ punctuation.definition.variable
//                          ^ punctuation.definition.expression
//                           ^^ variable.other
//                           ^ punctuation.definition.variable
//                             ^ punctuation.definition.expression
//                                    ^^ variable.other
//                                    ^ punctuation.definition.variable
//                                      ^ punctuation.section.brackets.begin
//                                       ^ constant.numeric
//                                        ^ punctuation.section.brackets.end
//                                                      ^^ variable.other
//                                                      ^ punctuation.definition.variable
//                                                        ^ punctuation.section.brackets.begin
//                                                         ^^ variable.other
//                                                         ^ punctuation.definition.variable
//                                                           ^ punctuation.section.brackets.end
//                                                                ^^ variable.other
//                                                                ^ punctuation.definition.variable
//                                                                  ^ punctuation.section.brackets.begin
//                                                                   ^ constant.other
//                                                                    ^ punctuation.section.brackets.end
//                                                                                  ^ punctuation.definition.expression
//                                                                                   ^^ variable.other
//                                                                                   ^ punctuation.definition.variable
//                                                                                      ^ keyword.operator
//                                                                                        ^^ variable.other
//                                                                                        ^ punctuation.definition.variable
//                                                                                          ^^ punctuation.accessor
//                                                                                            ^ variable.other.member
//                                                                                              ^ keyword.operator
//                                                                                                ^ constant.other

trait A
// ^ keyword.declaration.trait
//    ^ entity.name.trait
{
    public static ?Foo $str = '';
//  ^^^^^^ storage.modifier
//         ^^^^^^ storage.modifier
//                ^ storage.type.nullable
//                 ^^^ support.class
//                     ^ punctuation.definition.variable
//                      ^^^ variable.other
//                          ^ keyword.operator.assignment
}

class B
// ^ keyword.declaration.class
//    ^ entity.name.class
{
    use MyNamespace\Xyz,
//  ^^^^^^^^^^^^^^^^^^^^ meta.use
//      ^^^^^^^^^^^^^^^ meta.path
//      ^^^^^^^^^^^^^^^ entity.other.inherited-class
//                 ^ punctuation.separator.namespace
    Y,
//  ^ meta.use meta.path entity.other.inherited-class
    Z {
//  ^^^ meta.use
//  ^ meta.path
//    ^ meta.block punctuation.section.block.begin
        X::method1 as another1;
//      ^^^^^^^^^^^^^^^^^^^^^^^ meta.use meta.block
//       ^^ punctuation.accessor
//                 ^ keyword.other.use-as
        Y::method2 insteadof X;
//                 ^ keyword.other.insteadof
        X::method2 as another2;
//                 ^ keyword.other.use-as
    } protected $pro1;
//  ^ meta.use meta.block punctuation.section.block.end
//   ^ - meta.use
//    ^ storage.modifier

    public static ?Foo|\My\Bar|int $str = '';
//  ^^^^^^ storage.modifier
//         ^^^^^^ storage.modifier
//                ^ storage.type.nullable
//                 ^^^ support.class
//                    ^ punctuation.separator.type
//                     ^ punctuation.separator.namespace
//                      ^^ support.other.namespace
//                        ^ punctuation.separator.namespace
//                         ^^^ support.class
//                            ^ punctuation.separator.type
//                             ^^^ storage.type
//                                 ^ punctuation.definition.variable
//                                  ^^^ variable.other
//                                      ^ keyword.operator.assignment

    public const STR_1 = '';
//  ^^^^^^ storage.modifier
//         ^^^^^ storage.modifier
//               ^^^^^ constant
//                     ^ keyword.operator.assignment

    const STR_2 = '';
//  ^^^^^ storage.modifier
//        ^^^^^ constant
//              ^ keyword.operator.assignment

    public function abc(
//         ^ keyword.declaration.function
//                  ^ entity.name.function.php
        Foo|\Foo\Bar|?int $param1,
//      ^^^ support.class
//         ^ punctuation.separator.type
//          ^ punctuation.separator.namespace
//           ^^^ support.other.namespace
//              ^ punctuation.separator.namespace
//               ^^^ support.class
//                  ^ punctuation.separator.type
//                   ^ storage.type.nullable
//                    ^^^ storage.type
//                        ^ punctuation.definition.variable
//                         ^^^^^^ variable.parameter
        Foo|\Foo\Bar|?int $param2,
//      ^^^ support.class
//         ^ punctuation.separator.type
//          ^ punctuation.separator.namespace
//           ^^^ support.other.namespace
//              ^ punctuation.separator.namespace
//               ^^^ support.class
//                  ^ punctuation.separator.type
//                   ^ storage.type.nullable
//                    ^^^ storage.type
//                        ^ punctuation.definition.variable
//                         ^^^^^^ variable.parameter
        callable $param3,
//      ^^^^^^^^ storage.type
//               ^ punctuation.definition.variable
//                ^^^^^^ variable.parameter
        mixed $param3,
//      ^^^^^ storage.type
//            ^ punctuation.definition.variable
//             ^^^^^^ variable.parameter
        $param4
//      ^ punctuation.definition.variable
//       ^^^^^^ variable.parameter
    ): Foo|\Foo\Bar|?int|static {}
//     ^^^ support.class
//        ^ punctuation.separator.type
//         ^ punctuation.separator.namespace
//          ^^^ support.other.namespace
//             ^ punctuation.separator.namespace
//              ^^^ support.class
//                 ^ punctuation.separator.type
//                  ^ storage.type.nullable
//                   ^^^ storage.type
//                      ^ punctuation.separator.type
//                       ^^^^^^ storage.type
    {
        echo B::class;
//              ^ constant.class

        echo $this->pro1::FOO;
//           ^^^^^ variable.language
//                ^^ punctuation.accessor
//                  ^^^^ variable.other.member
//                      ^^ punctuation.accessor
//                        ^^^ constant.other.class

        echo $this->pro1::bar();
//           ^^^^^ variable.language
//                ^^ punctuation.accessor
//                  ^^^^ variable.other.member
//                      ^^ punctuation.accessor
//                        ^^^ variable.function

        parent::abc($var, $var2, $var3);
//      ^^^^^^ variable.language
//            ^^ punctuation.accessor

        $this->undo();
//      ^^^^^ variable.language
//      ^ punctuation.definition.variable

        $var2 = 'test';
//      ^^^^^ variable.other
//      ^ punctuation.definition.variable

        foreach (A::B() as $c => $d) {}
        //        ^^ punctuation.accessor
        //          ^ variable.function
        //              ^^ keyword.operator.logical.php
        //                    ^^ keyword.operator.key.php

        return new self();
//                 ^^^^ variable.language
    }
}


try {
// <- keyword.control.exception
    echo inverse(5) . "\n";
    throw new \Exception('Error!');
//  ^ keyword.control.exception
//            ^^^^^^^^^^ meta.path.php
//            ^ punctuation.separator.namespace.php - support.class
//             ^^^^^^^^^ support.class
    throw new \Custom\Exception('Error!');
//  ^ keyword.control.exception
//            ^^^^^^^^^^^^^^^^^ meta.path.php
//            ^ punctuation.separator.namespace.php
//             ^^^^^^ support.other.namespace.php
//                   ^ punctuation.separator.namespace.php
//                    ^^^^^^^^^ support.class
} catch (/* comment */ ExceptionExample $e) {
//       ^^^^^^^^^^^^^ comment.block
    echo 'Caught exception: ', $e->getMessage(), "\n";
} catch (Exception) {
//^ keyword.control.exception
//       ^^^^^^^^^ meta.path.php
//       ^^^^^^^^^ support.class.exception.php
} catch (Exception $e) {
//^ keyword.control.exception
//       ^^^^^^^^^ meta.path.php
//       ^^^^^^^^^ support.class.exception.php
//                 ^^ variable.other.php
    echo 'Caught exception: ', $e->getMessage(), "\n";
} catch (\Exception $e) {
//^ keyword.control.exception
//       ^^^^^^^^^^ meta.path.php
//       ^ punctuation.separator.namespace.php
//        ^^^^^^^^^ support.class.exception.php
//                  ^^ variable.other.php
    echo 'Caught exception: ', $e->getMessage(), "\n";
} catch (\Custom\Exception $e) {
//^ keyword.control.exception
//       ^^^^^^^^^^^^^^^^^ meta.path.php
//       ^ punctuation.separator.namespace.php
//        ^^^^^^ support.other.namespace.php
//              ^ punctuation.separator.namespace.php
//               ^^^^^^^^^ support.class.exception.php
//                         ^^ variable.other.php
    echo 'Caught exception: ', $e->getMessage(), "\n";
} catch (\Custom\Exception1 | \Custom\Exception2 $e) {
//^ keyword.control.exception
//       ^^^^^^^^^^^^^^^^^ meta.path.php
//       ^ punctuation.separator.namespace.php
//        ^^^^^^ support.other.namespace.php
//              ^ punctuation.separator.namespace.php
//               ^^^^^^^^^^ support.class.exception.php
//                          ^ punctuation.separator.catch.php
//                            ^^^^^^^^^^^^^^^^^ meta.path.php
//                            ^ punctuation.separator.namespace.php
//                             ^^^^^^ support.other.namespace.php
//                                   ^ punctuation.separator.namespace.php
//                                    ^^^^^^^^^^ support.class.exception.php
//                                               ^^ variable.other.php
    echo 'Caught exception: ', $e->getMessage(), "\n";
} catch (
//^ keyword.control.exception
    \Custom\Exception1 |
//  ^^^^^^^^^^^^^^^^^ meta.path.php
//  ^ punctuation.separator.namespace.php
//   ^^^^^^ support.other.namespace.php
//         ^ punctuation.separator.namespace.php
//          ^^^^^^^^^^ support.class.exception.php
//                     ^ punctuation.separator.catch.php
    \Custom\Exception2 $e
//  ^ punctuation.separator.namespace.php
//   ^^^^^^ support.other.namespace.php
//         ^ punctuation.separator.namespace.php
//          ^^^^^^^^^^ support.class.exception.php
//                     ^^ variable.other.php
) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
} finally {
//^ keyword.control.exception
    echo "First finally.\n";
}

function generate()
{
    yield 1;
//  ^ keyword.control
}

function generate2()
{
    yield from generate();
//  ^ keyword.control
//        ^ keyword.control
}

$var = 0;
//     ^ meta.number.integer.decimal constant.numeric.value

$var2 = -123.456e10;
//      ^ keyword.operator.arithmetic.php - meta.number - constant.numeric
//       ^^^^^^^^^^ meta.number.float.decimal constant.numeric.value
//          ^ punctuation.separator.decimal.php

$var2 = -12_3.45_6e1_0;
//      ^ keyword.operator.arithmetic.php - meta.number - constant.numeric
//       ^^^^^^^^^^^^^ meta.number.float.decimal constant.numeric.value
//           ^ punctuation.separator.decimal.php

$var2 = -123.e10;
//      ^ keyword.operator.arithmetic.php - meta.number - constant.numeric
//       ^^^^^^^ meta.number.float.decimal constant.numeric.value
//          ^ punctuation.separator.decimal.php

$var2 = -12_3.e1_0;
//      ^ keyword.operator.arithmetic.php - meta.number - constant.numeric
//       ^^^^^^^^^ meta.number.float.decimal constant.numeric.value
//           ^ punctuation.separator.decimal.php

$var2 = -.123e10;
//      ^ keyword.operator.arithmetic.php - meta.number - constant.numeric
//       ^^^^^^^ meta.number.float.decimal constant.numeric.value
//       ^ punctuation.separator.decimal.php

$var2 = -.12_3e1_0;
//      ^ keyword.operator.arithmetic.php - meta.number - constant.numeric
//       ^^^^^^^^^ meta.number.float.decimal constant.numeric.value
//       ^ punctuation.separator.decimal.php

$var2 = -123e10;
//      ^ keyword.operator.arithmetic.php - meta.number - constant.numeric
//       ^^^^^^ meta.number.float.decimal constant.numeric.value

$var2 = -12_3e1_0;
//      ^ keyword.operator.arithmetic.php - meta.number - constant.numeric
//       ^^^^^^^^ meta.number.float.decimal constant.numeric.value

$var3 = 0x0f;
//      ^^^^ meta.number.integer.hexadecimal
//      ^^ constant.numeric.base.php
//        ^^ constant.numeric.value

$var3 = 0o0766;
//      ^^^^^^ meta.number.integer.octal
//      ^^ constant.numeric.base.php
//        ^^^^ constant.numeric.value

$var3 = 0x0_f;
//      ^^^^ meta.number.integer.hexadecimal
//      ^^ constant.numeric.base.php
//        ^^^ constant.numeric.value

$var4 = 0b0111;
//      ^^^^^^ meta.number.integer.binary
//      ^^ constant.numeric.base.php
//        ^^^^ constant.numeric.value

$var4 = 0b0_1_1_1;
//      ^^^^^^^^^ meta.number.integer.binary
//      ^^ constant.numeric.base.php
//        ^^^^^^^ constant.numeric.value

// class name should be case-insensitive
$object = new ArRaYoBjEcT();
//            ^^^^^^^^^^^ support.class.builtin

// constant name should be case-sensitive
$const = E_aLL;
//       ^^^^^ - support.constant.core

// function name should be case-sensitive
$random = ArRaY_RaNd($array);
//        ^^^^^^^^^^ support.function.array

// test for constants for each group in the syntax definition
$const = E_ALL;
//       ^^^^^ support.constant.core
$const = CASE_LOWER;
//       ^^^^^^^^^^ support.constant.std
$const = CURLAUTH_BASIC;
//       ^^^^^^^^^^^^^^ support.constant.ext
$const = T_ABSTRACT;
//       ^^^^^^^^^^ support.constant.parser-token

  foo_bar:
//^^^^^^^ entity.name.label.php - keyword.control.php

if ((include 'vars.php') == TRUE) {
//   ^^^^^^^ keyword.control.import.include.php
//   ^^^^^^^^^^^^^^^^^^ meta.include.php
//                     ^ - meta.include.php
}

// evaluated as include(('vars.php') == TRUE), i.e. include('')
if (include('vars.php') == TRUE) {
//  ^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.include.php
//                             ^ - meta.include.php
}

$
# <- punctuation.definition.variable

$a += .5;
// ^^ keyword.operator.assignment.augmented.php
//    ^^ constant.numeric

$a .= 1;
// ^^ keyword.operator.assignment.augmented.php

$a ??= 1;
// ^^^ keyword.operator.assignment.augmented.php

$a = $b ?? 1;
//      ^^ keyword.operator.null-coalescing.php

if ($a && $b || !$c);
//     ^^ keyword.operator.logical
//           ^^ keyword.operator.logical
//              ^ keyword.operator.logical

if ($a !== $b || $a == $b);
//     ^^^ keyword.operator.comparison
//                  ^^ keyword.operator.comparison

if ():
//   ^ punctuation.separator.colon
else:
// <- keyword.control - entity.name.label
//  ^ punctuation.separator.colon
endif;

switch (1) {
//^ keyword.control
    case 1:
  //^^^^ keyword.control.php - entity.name.label.php
  //      ^ punctuation.separator.colon
    default:
  //^^^^^^^ keyword.control.php - entity.name.label.php
}

$statement = match ($this->lexer->lookahead['type']) {
//           ^^^^^ keyword.control
    Lexer::T_UPDATE => $this->UpdateStatement(),
//  ^^^^^ support.class
//       ^^ punctuation.accessor.double-colon
//         ^^^^^^^^ constant.other.class
//                  ^^ keyword.operator.key
//                     ^^^^^ variable.language
//                          ^^ punctuation.accessor.arrow
//                            ^^^^^^^^^^^^^^^ variable.function
//                                           ^^ meta.group
    Lexer::T_DELETE => $this->DeleteStatement(),
//                  ^^ keyword.operator.key
    default => $this->syntaxError('UPDATE or DELETE'),
//  ^^^^^^^ keyword.control
//          ^^ keyword.operator.key
};

$non_sql = "NO SELECT HIGHLIGHTING!";
//         ^^^^^^^^^^^^^^^^^^^^^^^^^ meta.string.php string.quoted.double.php - meta.interpolation - string string
//         ^ punctuation.definition.string.begin
//             ^ - source.sql
//                                 ^ punctuation.definition.string.end

$sql = "CREATE TABLE version";
//     ^ meta.string.php string.quoted.double.php punctuation.definition.string.begin.php - meta.interpolation - string string
//      ^^^^^^^^^^^^^^^^^^^^ meta.string.php meta.interpolation.php source.sql - string.quoted.double.php
//                          ^ meta.string.php string.quoted.double.php punctuation.definition.string.end.php - meta.interpolation - string string
//      ^^^^^^ keyword.other.create.sql

$sql = "
    CREATE TABLE `version`...
// ^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.string.php meta.interpolation.php source.sql - string.quoted.double.php
//  ^^^^^^ keyword.other.create.sql
";

// Do not highlight plain SQL indicator as SQL
$sql = "SELECT";
//      ^^^^^^ - keyword.other.DML

$sql = "
    SELECT
//  ^^^^^^ keyword.other.DML
    *
    FROM users
    WHERE first_name = 'Eric'
";

$sql = "SELECT * FROM users WHERE first_name = 'Eric'";
//     ^ meta.string.php string.quoted.double.php punctuation.definition.string.begin.php - meta.interpolation - string string
//      ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.string.php meta.interpolation.php source.sql - string.quoted.double.php
//      ^ keyword.other.DML
//                                             ^^^^^^ string.quoted.single.sql
//                                                   ^ meta.string.php string.quoted.double.php punctuation.definition.string.end.php - meta.interpolation - string string

// Ensure we properly exist from SQL when hitting PHP end-of-string
$sql = "SELECT * FROM users WHERE first_name = 'Eric";
//     ^ meta.string.php string.quoted.double.php punctuation.definition.string.begin.php - meta.interpolation - string string
//      ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.string.php meta.interpolation.php source.sql - string.quoted.double.php
//      ^ keyword.other.DML
//                                             ^^^^^ string.quoted.single.sql
//                                                  ^ meta.string.php string.quoted.double.php punctuation.definition.string.end.php - meta.interpolation - string string

$sql = "
    SELECT * FROM users WHERE first_name = 'Eric'
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.string.php meta.interpolation.php source.sql - string.quoted.double.php
//  ^ keyword.other.DML
//                                         ^^^^^^ string.quoted.single.sql
";
// <- meta.string.php string.quoted.double.php punctuation.definition.string.end.php - meta.interpolation - string string

$sql = "SELECT " . $col . "FROM $table WHERE ( first_name =" . $name . ")" ; . "GROUP BY" ;
//     ^ meta.string.php - meta.interpolation
//      ^^^^^^^ meta.string.php meta.interpolation.php source.sql.embedded.php
//             ^ meta.string.php - meta.interpolation
//              ^^^^^^^^^^ - meta.string
//                        ^ meta.string.php - meta.interpolation
//                         ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.string.php meta.interpolation.php source.sql.embedded.php
//                                                         ^ meta.string.php - meta.interpolation
//                                                          ^^^^^^^^^^^ - meta.string
//                                                                     ^ meta.string.php - meta.interpolation
//                                                                      ^ meta.string.php meta.interpolation.php source.sql.embedded.php
//                                                                       ^ meta.string.php - meta.interpolation
//                                                                        ^^^^^ - meta.string
//                                                                             ^^^^^^^^^^ meta.string.php string.quoted.double.php - meta.interpolation
//     ^ string.quoted.double.php punctuation.definition.string.begin.php
//      ^^^^^^ keyword.other.DML.sql
//             ^ string.quoted.double.php punctuation.definition.string.end.php
//               ^ keyword.operator.string.php
//                 ^^^^ variable.other.php
//                      ^ keyword.operator.string.php
//                        ^ string.quoted.double.php punctuation.definition.string.begin.php
//                              ^^^^^^ variable.other.php
//                                                         ^ string.quoted.double.php punctuation.definition.string.end.php
//                                                           ^ keyword.operator.string.php
//                                                             ^^^^^ variable.other.php
//                                                                   ^ keyword.operator.string.php
//                                                                     ^ string.quoted.double.php punctuation.definition.string.begin.php
//                                                                       ^ string.quoted.double.php punctuation.definition.string.end.php
//                                                                         ^ punctuation.terminator.expression.php
//                                                                           ^ keyword.operator.string.php
//                                                                                        ^ punctuation.terminator.expression.php

$non_sql = 'NO SELECT HIGHLIGHTING!';
//         ^^^^^^^^^^^^^^^^^^^^^^^^^ meta.string.php string.quoted.single.php - meta.interpolation - string string
//         ^ punctuation.definition.string.begin
//             ^ - source.sql
//                                 ^ punctuation.definition.string.end

$sql = 'SELECT * FROM users WHERE first_name = \'Eric\'';
//     ^ meta.string.php string.quoted.single.php punctuation.definition.string.begin.php - meta.interpolation - string string
//      ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.string.php meta.interpolation.php source.sql - string.quoted.single.php
//      ^ keyword.other.DML
//                                             ^^^^^^^^ meta.string.sql string.quoted.single.sql
//                                             ^^ constant.character.escape.php
//                                                   ^^ constant.character.escape.php
//                                                     ^ meta.string.php string.quoted.single.php punctuation.definition.string.end.php - meta.interpolation - string string

$sql = '
    SELECT * FROM users WHERE first_name = \'Eric\'
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.string.php meta.interpolation.php source.sql - string.quoted.single.php
//  ^ keyword.other.DML
//                                         ^^ constant.character.escape.php
';
// <- meta.string.php string.quoted.single.php punctuation.definition.string.end.php - meta.interpolation - string string

$sql = 'SELECT ' . $col . 'FROM table WHERE ( first_name =' . $name . ')' ; . 'GROUP BY' ;
//     ^ meta.string.php - meta.interpolation
//      ^^^^^^^ meta.string.php meta.interpolation.php source.sql.embedded.php
//             ^ meta.string.php - meta.interpolation
//              ^^^^^^^^^^ - meta.string
//                        ^ meta.string.php - meta.interpolation
//                         ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.string.php meta.interpolation.php source.sql.embedded.php
//                                                        ^ meta.string.php - meta.interpolation
//                                                         ^^^^^^^^^^^ - meta.string
//                                                                    ^ meta.string.php - meta.interpolation
//                                                                     ^ meta.string.php meta.interpolation.php source.sql.embedded.php
//                                                                      ^ meta.string.php - meta.interpolation
//                                                                       ^^^^^ - meta.string
//                                                                            ^^^^^^^^^^ meta.string.php string.quoted.single.php - meta.interpolation
//     ^ string.quoted.single.php punctuation.definition.string.begin.php
//      ^^^^^^ keyword.other.DML.sql
//             ^ string.quoted.single.php punctuation.definition.string.end.php
//               ^ keyword.operator.string.php
//                 ^^^^ variable.other.php
//                      ^ keyword.operator.string.php
//                        ^ string.quoted.single.php punctuation.definition.string.begin.php
//                                                        ^ string.quoted.single.php punctuation.definition.string.end.php
//                                                          ^ keyword.operator.string.php
//                                                            ^^^^^ variable.other.php
//                                                                  ^ keyword.operator.string.php
//                                                                    ^ string.quoted.single.php punctuation.definition.string.begin.php
//                                                                      ^ string.quoted.single.php punctuation.definition.string.end.php
//                                                                        ^ punctuation.terminator.expression.php
//                                                                          ^ keyword.operator.string.php
//                                                                                       ^ punctuation.terminator.expression.php

preg_replace('/[a-zSOME_CHAR]*+\'\n  $justTxt  \1  \\1/m');
//           ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ string.quoted.single
//            ^ punctuation.definition.string.regex-delimiter.begin
//             ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ source.regexp
//             ^ punctuation.definition.character-class.begin.regexp
//              ^^^ constant.other.character-class.range.regexp
//                 ^^^^^^^^^ constant.other.character-class.set.regexp
//                          ^ punctuation.definition.character-class.end.regexp
//                           ^^ keyword.operator.quantifier
//                             ^^^^ constant.character.escape
//                                   ^ keyword.control.anchor.regexp
//                                             ^^ keyword.other.back-reference.regexp
//                                                 ^^^ keyword.other.back-reference.regexp
//                                                    ^ punctuation.definition.string.regex-delimiter.end
//                                                     ^ meta.regex.modifier
//                                                      ^ string.quoted.single

preg_replace("/[a-zSOME_CHAR]*+\'\n  $vairble  \1  \\1/m");
//           ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ string.quoted.double
//            ^ punctuation.definition.string.regex-delimiter.begin
//             ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ source.regexp
//             ^ punctuation.definition.character-class.begin.regexp
//              ^^^ constant.other.character-class.range.regexp
//                 ^^^^^^^^^ constant.other.character-class.set.regexp
//                          ^ punctuation.definition.character-class.end.regexp
//                           ^^ keyword.operator.quantifier
//                             ^^^^ constant.character.escape
//                                   ^ punctuation.definition.variable
//                                             ^^ constant.character.escape
//                                                 ^^ constant.character.escape
//                                                    ^ punctuation.definition.string.regex-delimiter.end
//                                                     ^ meta.regex.modifier
//                                                      ^ string.quoted.double

preg_replace("/^(?=foo)|(?>a|b|\s*)|(?im:toggle)(?#comment)$/uxS");
//            ^ punctuation.definition.string.regex-delimiter.begin
//             ^ keyword.control.anchor.regexp
//               ^^ constant.other.assertion.regexp meta.assertion.look-ahead.regexp
//                     ^ keyword.operator.or.regexp
//                       ^^ constant.other.assertion.regexp meta.assertion.atomic-group.regexp
//                          ^ keyword.operator.or.regexp
//                            ^ keyword.operator.or.regexp
//                             ^^ constant.character.character-class.regexp
//                               ^ keyword.operator.quantifier.regexp
//                                   ^^^^ keyword.other.option-toggle.regexp
//                                              ^^^^^^^^^^^ comment.block
//                                              ^ punctuation.definition.comment.begin.regexp
//                                                        ^ punctuation.definition.comment.end.regexp
//                                                         ^ keyword.control.anchor.regexp
//                                                          ^ punctuation.definition.string.regex-delimiter.end
//                                                           ^^^ meta.regex.modifier

preg_replace('/(?P<name>foo|bar)\g{name}\k<name>/');
//             ^ punctuation.definition.group.begin.regexp
//              ^^ constant.other.assertion.regexp
//                ^ punctuation.definition.group.capture.begin.regexp
//                 ^^^^ entity.name.other.group.regexp
//                         ^ keyword.operator.or.regexp
//                             ^ punctuation.definition.group.end.regexp
//                              ^^^ keyword.other.back-reference.named.regexp
//                                 ^^^^ entity.name.other.group.regexp
//                                     ^ keyword.other.back-reference.named.regexp
//                                      ^^^ keyword.other.back-reference.named.regexp
//                                         ^^^^ entity.name.other.group.regexp

preg_replace("/a{,6}b{3,}c{3,6}/");
//              ^^^^ keyword.operator.quantifier.regexp
//                   ^^^^ keyword.operator.quantifier.regexp
//                        ^^^^^ keyword.operator.quantifier.regexp

$regex = '/
    a{,6}
//   ^^^^ keyword.operator.quantifier.regexp
    b{3,} # this is comment
//   ^^^^ keyword.operator.quantifier.regexp
//        ^^^^^^^^^^^^^^^^^ comment.regexp
    c{3,6}
//   ^^^^^ keyword.operator.quantifier.regexp
/ux';

$regex = '/foo?/ux';
//            ^ keyword.operator.quantifier.regexp

$not_regex = 'foo?';
//               ^ string - source.regexp

$not_regex = '/foo?';
//                ^ string - source.regexp

// there is no "T" regex modifier
$not_regex = '/foo?/uTx';
//                ^ string - source.regexp

echo <<<EOT
//   ^^^ keyword.operator.heredoc
//      ^^^ meta.string.heredoc meta.tag.heredoc
//      ^^^ entity.name.tag.heredoc
This is a test! $var
//^^^^^^^^^^^^^^^^^^ string.unquoted.heredoc
//              ^^^^ variable.other
EOT;
// <- entity.name.tag.heredoc

// PHP 7.3: Flexible Heredoc and Nowdoc Syntaxes
// see https://wiki.php.net/rfc/flexible_heredoc_nowdoc_syntaxes
echo <<<EOT
//   ^^^ keyword.operator.heredoc
//      ^^^ meta.string.heredoc meta.tag.heredoc
//      ^^^ entity.name.tag.heredoc
    This is a test! $var
//  ^^^^^^^^^^^^^^^^^^^^ string.unquoted.heredoc
//                  ^^^^ variable.other
    EOT;
//  ^^^ entity.name.tag.heredoc
//     ^ punctuation.terminator.expression
//      ^ meta.heredoc-end

echo <<<'EOT'
//   ^^^ keyword.operator.heredoc
//      ^ punctuation.definition.tag.begin
//      ^^^^^ meta.string.heredoc meta.tag.heredoc
//       ^^^ entity.name.tag.heredoc
This is a test! $var
//^^^^^^^^^^^^^^^^^^ string.unquoted.heredoc
//              ^^^^ - variable.other
EOT;
// <- entity.name.tag.heredoc

echo <<<HTML
//   ^^^ keyword.operator.heredoc
//      ^^^^ meta.string.heredoc meta.tag.heredoc
//      ^^^^ entity.name.tag.heredoc
This is a test!
<div class="foo-bar"></div>
//^^^^^^^^^^^^^^^^^^^^^^^^^ meta.embedded.html text.html
// <- punctuation.definition.tag.begin
//^^ entity.name.tag.block
//   ^^^^^ entity.other.attribute-name
//         ^^^^^^^^^ string.quoted.double
HTML;
// <- entity.name.tag.heredoc
//  ^ punctuation.terminator.expression
//   ^ meta.heredoc-end

echo <<< JAVASCRIPT
//   ^^^ keyword.operator.heredoc
//       ^^^^^^^^^^ meta.string.heredoc meta.tag.heredoc
//       ^^^^^^^^^^ entity.name.tag.heredoc
var foo = 1;
//^^^^^^^^^^ meta.embedded.js source.js
// <- keyword.declaration
//  ^^^ variable.other.readwrite
//        ^ constant.numeric
$var
// <- variable.other.php
//^^ variable.other.php
    ($var)
//   ^^^^ variable.other.php
JAVASCRIPT;
// <- entity.name.tag.heredoc
//        ^ punctuation.terminator.expression
//         ^ meta.heredoc-end

echo <<<CSS
//   ^^^ keyword.operator.heredoc
//      ^^^ meta.string.heredoc meta.tag.heredoc
//      ^^^ entity.name.tag.heredoc
h2 {font-family: 'Arial';}
//^^^^^^^^^^^^^^^^^^^^^^^^ meta.embedded.css source.css
// <- entity.name.tag
// ^ punctuation.section.block
//               ^^^^^^^ string.quoted.single
h3 {font-size: "$h3_size";}
//              ^^^^^^^^ variable.other.php
CSS;
// <- entity.name.tag.heredoc
// ^ punctuation.terminator.expression
//  ^ meta.heredoc-end

echo <<< yml
//   ^^^ keyword.operator.heredoc
//       ^^^ meta.string.heredoc meta.tag.heredoc
//       ^^^ entity.name.tag.heredoc
one: two
//^^^^^^ meta.embedded.yaml source.yaml
//^ meta.mapping.key string
// ^       punctuation.separator.key-value.mapping
//   ^^^ string
three: "$four"
//^^^^^^^^^^^^ meta.embedded.yaml source.yaml
//^^^ meta.mapping.key string
//   ^       punctuation.separator.key-value.mapping
//     ^^^^^^^ string.quoted.double
//      ^^^^^ variable.other.php
Yml;
// <- meta.embedded.yaml source.yaml string.unquoted.plain.out.yaml
//^^ meta.embedded.yaml source.yaml string.unquoted.plain.out.yaml
yml;
// <- entity.name.tag.heredoc
// ^ punctuation.terminator.expression
//  ^ meta.heredoc-end

echo <<<sql
//   ^^^ keyword.operator.heredoc
//      ^^^ meta.string.heredoc meta.tag.heredoc
//      ^^^ entity.name.tag.heredoc
SELECT * FROM users WHERE first_name = 'John' LIMIT $limit
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.embedded.sql source.sql.embedded.php
// <- keyword.other.DML
//     ^ variable.language.wildcard.asterisk
//                                     ^^^^^^ string.quoted.single
//                                                  ^^^^^^ variable.other.php
sql;
// <- entity.name.tag.heredoc
// ^ punctuation.terminator.expression
//  ^ meta.heredoc-end


echo <<<'SQL'
//   ^^^ keyword.operator.heredoc
//      ^ punctuation.definition.tag.begin
//      ^^^^^ meta.string.heredoc meta.tag.heredoc
//       ^^^ entity.name.tag.heredoc
SELECT * FROM users WHERE first_name = 'John'\n
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.embedded.sql source.sql.embedded.php
// <- keyword.other.DML
//     ^ variable.language.wildcard.asterisk
//                                     ^^^^^^ string.quoted.single
//                                           ^^ - constant.character.escape.php
SQL;
// <- entity.name.tag.heredoc
// ^ punctuation.terminator.expression
//  ^ meta.heredoc-end



class OutputsHtml {
    function embedHtml() {
        if (1) {
//             ^ meta.function meta.block punctuation.section.block.begin
        }
//      ^ meta.function meta.block punctuation.section.block.end
        else {
//           ^ meta.function meta.block punctuation.section.block.begin
            ?>
//          ^^ meta.embedded.block punctuation.section.embedded.end - source.php
//            ^ meta.embedded.block meta.html-newline-after-php - punctuation.section.embedded - source.php
            <span></span>
//          ^^^^^^ meta.tag - source.php
            <?
//          ^^ meta.embedded.block punctuation.section.embedded.begin
        }
//      ^ meta.function meta.block punctuation.section.block.end
        ?>
//      ^^ meta.embedded.block punctuation.section.embedded.end - source.php
//        ^ meta.embedded.block meta.html-newline-after-php - punctuation.section.embedded - source.php

        <div class="acf-gallery-side-info acf-cf<?php if (true) { echo ' class-name'; } ?>" id="myid"></div>
//      ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.tag
//      ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ - source.php
//           ^^^^^ meta.attribute-with-value
//                                              ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.embedded.line.nested.php
//                                                                                        ^^^^^^^^^^^^^^^^^^ - source.php
//                                              ^^^^^ punctuation.section.embedded.begin - source.php
//                                                   ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ source.php
//                                                                                      ^^ punctuation.section.embedded.end - source.php
//                                                                                          ^^^^^^^^^ meta.attribute-with-value
//                 ^ punctuation.definition.string.begin.html
//                 ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ string.quoted.double.html
//                                                                                        ^ punctuation.definition.string.end.html
        <?= var_dump($foo)
//      ^^^^^^^^^^^^^^^^^^ meta.embedded.line.nested
//      ^^^ punctuation.section.embedded.begin - source.php
//         ^^^^^^^^^^^^^^^ source.php
        ?>
//      ^^ meta.embedded.line.nested punctuation.section.embedded.end - source.php
//        ^ meta.embedded.line.nested meta.html-newline-after-php - punctuation.section.embedded - source.php

        <?php
//      ^^^^^ meta.embedded.block punctuation.section.embedded.begin - source.php
    }
}

function embedHtml() {
    if (1) {
//         ^ meta.function meta.block punctuation.section.block.begin
    }
//  ^ meta.function meta.block punctuation.section.block.end
    else {
//       ^ meta.function meta.block punctuation.section.block.begin
        ?>
//      ^^ meta.embedded.block.php punctuation.section.embedded.end - source.php
//        ^ meta.embedded.block.php meta.html-newline-after-php - punctuation.section.embedded.end
        <span></span>
//      ^^^^^^ meta.tag - source.php
        <?
//      ^^ punctuation.section.embedded.begin - source.php
    }
//  ^ meta.function meta.block punctuation.section.block.end

    $myClass = new class {
        function foo() {
            ?>
//          ^^ meta.embedded.block.php punctuation.section.embedded.end - source.php
//            ^ meta.embedded.block.php meta.html-newline-after-php - punctuation.section.embedded.end
            <div></div>
//          ^^^^^^^^^^^ meta.tag - source.php
            <?
        }
    };

    $myClosure = function() use ($var) {
        ?>
        <div></div>
//      ^^^^^^^^^^^ meta.tag - source.php
        <?
    };

    try {
        if (1) {
            if (1) {
                try {
// ^^^^^^^^^^^^^^^^^^ source.php
                    ?>
//                  ^^ punctuation.section.embedded.end - source.php

                    <div class="acf-gallery-side-info acf-cf<?php if (true) { echo ' class-name'; } ?>" id="myid"></div>
//                  ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.tag
//                  ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ - source.php
//                       ^^^^^ meta.attribute-with-value
//                                                          ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.embedded.line.nested.php
//                                                                                                    ^^^^^^^^^^^^^^^^^^ - source.php
//                                                          ^^^^^ punctuation.section.embedded.begin
//                                                               ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ source.php
//                                                                                                  ^^ punctuation.section.embedded.end
//                                                                                                      ^^^^^^^^^ meta.attribute-with-value
//                             ^ punctuation.definition.string.begin.html
//                             ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ string.quoted.double.html
//                                                                                                    ^ punctuation.definition.string.end.html
                    <?php
//                  ^^^^^ punctuation.section.embedded.begin
//                       ^ source.php
                } finally {
                    if (1) {
                        if (1) {
                            ?>
//                          ^^ punctuation.section.embedded.end
                            <div>
//                          ^^^^^ meta.tag - source.php
                            </div>
                            <?
//                          ^^ punctuation.section.embedded.begin
                        }
                    }
                }
            }
        }
    } catch (Exception $e) {
//    ^^^^^^^^^^^^^^^^^^^^ meta.catch.php
//           ^^^^^^^^^ meta.path
//    ^^^^^ keyword.control.exception.catch.php

    }
}

class D {
    private readonly $prop;
//          ^^^^^^^^ storage.modifier

    public function __construct($val) {
//                  ^^^^^^^^^^^ entity.name.function.php support.function.magic.php
        $this->prop = $val;
    }

    public function __debugInfo() {
//                  ^^^^^^^^^^^ entity.name.function.php support.function.magic.php
        return [
            'propSquared' => $this->prop ** 2,
        ];
    }

    public function __toString()
//                  ^^^^^^^^^^ entity.name.function.php support.function.magic.php
//                            ^^ meta.function.parameters.php punctuation.section.group
    {
        return $this->prop;
    }

    public function __toStringTest()
//                  ^^^^^^^^^^^^^^ entity.name.function.php - support.function.magic.php
//                                ^^ - entity.name.function.php - support.function.magic.php
    {
        return $this->prop;
    }

    public function __test()
//                  ^^^^^^ entity.name.function.php - support.function.magic.php
    {
    }
}

class E {
    public function __construct(
        public readonly int $val = 1
//      ^^^^^^ storage.modifier
//             ^^^^^^^^ storage.modifier
    ) {}
}

var_dump(new C(42));
//           ^ meta.path support.class

// test for https://github.com/sublimehq/Packages/issues/3134
$array = array_reduce(
    $items,
    function ($array, $item) {
        return $array;
    },
    $initial
);
// <- punctuation.section.group.end

?>

<div><?php include 'image.svg' ?></div>
//                             ^^ punctuation.section.embedded.end.php

// don't break php termination highlighting after incomplete item-access expression
<?php  { ?> <div> <? $var[9 + ?> </div>
//^^^^^^^^^ meta.embedded.line.php
//         ^^^^^^^ - meta.embedded
//                ^^^^^^^^^^^^^^ meta.embedded.line.php
//                              ^^^^^^^^ - meta.embedded
//     ^ punctuation.section.block.begin.php
//       ^^ punctuation.section.embedded.end.php
//          ^^^^^ meta.tag
//                ^^ punctuation.section.embedded.begin.php
//                   ^^^^ variable.other.php
//                       ^^^^ meta.item-access
//                           ^ - meta.item-access
//                            ^^ punctuation.section.embedded.end.php
//                               ^^^^^^ meta.tag

// don't break block termination highlighting after incomplete item-access expression
<?php  { ?> <div> <? $var[9 + } ?> </div>
//^^^^^^^^^ meta.embedded.line.php
//         ^^^^^^^ - meta.embedded
//                ^^^^^^^^^^^^^^^^ meta.embedded.line.php
//                                ^^^^^^^^ - meta.embedded
//     ^ punctuation.section.block.begin.php
//       ^^ punctuation.section.embedded.end.php
//          ^^^^^ meta.tag
//                ^^ punctuation.section.embedded.begin.php
//                   ^^^^ variable.other.php
//                       ^^^^^ meta.item-access
//                            ^ punctuation.section.block.end.php
//                              ^^ punctuation.section.embedded.end.php
//                                 ^^^^^^ meta.tag

// don't break block termination highlighting after incomplete item-access expression
<?php  { ?> <div> <? $var[9 + ; ?> </div>
//^^^^^^^^^ meta.embedded.line.php
//         ^^^^^^^ - meta.embedded
//                ^^^^^^^^^^^^^^^^ meta.embedded.line.php
//                                ^^^^^^^^ - meta.embedded
//     ^ punctuation.section.block.begin.php
//       ^^ punctuation.section.embedded.end.php
//          ^^^^^ meta.tag
//                ^^ punctuation.section.embedded.begin.php
//                   ^^^^ variable.other.php
//                       ^^^^^ meta.item-access
//                            ^ punctuation.terminator.expression.php
//                              ^^ punctuation.section.embedded.end.php
//                                 ^^^^^^ meta.tag

// don't break highlighting after incomplete catch parameter list
<?php try { ?> <div> <? } catch(  ?> </div>
//^^^^^^^^^^^^ meta.embedded.line.php
//            ^^^^^^^ - meta.embedded
//                   ^^^^^^^^^^^^^^^ meta.embedded.line.php
//                                  ^^^^^^^^ - meta.embedded
//    ^^^ keyword.control.exception.php
//        ^ punctuation.section.block.begin.php
//          ^^ punctuation.section.embedded.end.php
//             ^^^^^ meta.tag
//                   ^^ punctuation.section.embedded.begin.php
//                      ^ punctuation.section.block.end.php
//                        ^^^^^ keyword.control.exception.catch.php
//                             ^ punctuation.section.group.begin.php
//                                ^^ punctuation.section.embedded.end.php
//                                   ^^^^^^ meta.tag

<div attr-<?= $bar ?>-true=va<? $baz ?>l?ue></div>
//   ^^^^^^^^^^^^^^^^^^^^^ entity.other.attribute-name
//        ^^^ punctuation.section.embedded.begin
//                 ^^ punctuation.section.embedded.end
//                         ^^^^^^^^^^^^^^^^ string.unquoted
//                           ^^ punctuation.section.embedded.begin.php
//                                   ^^ punctuation.section.embedded.end.php

<option<?php if($condition): ?> selected<?php endif; ?>></option>
//     ^^^^^ punctuation.section.embedded.begin
//                           ^^ punctuation.section.embedded.end
//                                      ^^^^^ punctuation.section.embedded.begin
//                                                   ^^ punctuation.section.embedded.end

  <tag-<?php $bar ?>na<?php $baz ?>me att<?php $bar ?>rib=false />
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.tag.other.html
//^ punctuation.definition.tag.begin.html
// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ entity.name.tag.other.html
//     ^^^^^ punctuation.section.embedded.begin.php
//     ^^^^^^^^^^^^^ meta.embedded.line.php
//                ^^ punctuation.section.embedded.end
//                    ^^^^^ punctuation.section.embedded.begin.php
//                    ^^^^^^^^^^^^^ meta.embedded.line.php
//                               ^^ punctuation.section.embedded.end
//                                    ^^^^^^^^^^^^^^^^^^^^^^^^^ meta.attribute-with-value.html
//                                    ^^^^^^^^^^^^^^^^^^^ entity.other.attribute-name.html
//                                       ^^^^^ punctuation.section.embedded.begin.php
//                                       ^^^^^^^^^^^^^ meta.embedded.line.php
//                                                  ^^ punctuation.section.embedded.end
//                                                              ^^ punctuation.definition.tag.end.html

  <tag<?php $bar ?>na<?php $baz ?>me att<?php $bar ?>rib=false />
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ meta.tag.other.html
//^ punctuation.definition.tag.begin.html
// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ entity.name.tag.other.html
//    ^^^^^ punctuation.section.embedded.begin.php
//    ^^^^^^^^^^^^^ meta.embedded.line.php
//               ^^ punctuation.section.embedded.end
//                   ^^^^^ punctuation.section.embedded.begin.php
//                   ^^^^^^^^^^^^^ meta.embedded.line.php
//                              ^^ punctuation.section.embedded.end
//                                   ^^^^^^^^^^^^^^^^^^^^^^^^^ meta.attribute-with-value.html
//                                   ^^^^^^^^^^^^^^^^^^^ entity.other.attribute-name.html
//                                      ^^^^^ punctuation.section.embedded.begin.php
//                                      ^^^^^^^^^^^^^ meta.embedded.line.php
//                                                 ^^ punctuation.section.embedded.end
//                                                             ^^ punctuation.definition.tag.end.html


<div class="test <?= $foo ?>"></div>
//   ^^^^^^^^^^^^^^^^^^^^^^^^ meta.attribute-with-value.class.html
//         ^ punctuation.definition.string.begin.html
//         ^^^^^^^^^^^^^^^^^^ string.quoted.double.html
//                          ^ punctuation.definition.string.end.html
//               ^^^^^^^^^^^ meta.embedded.line
//               ^^^ punctuation.section.embedded.begin - source.php
//                  ^^^^^^ source.php
//                   ^^^^ variable.other
//                        ^^ punctuation.section.embedded.end - source.php
//                           ^ punctuation.definition.tag.end.html

<script>
    var foo = 4;
//  ^ keyword.declaration
//      ^^^ variable.other.readwrite
//          ^ keyword.operator
//            ^ constant.numeric
    <?
    if ($minimal_increase) {
        ?>
        foo += 1;
//      ^^^^^^^^^ source.js.embedded
//      ^^^ variable.other.readwrite
//          ^^ keyword.operator
//             ^ constant.numeric
        <?
    } else {
//  ^^^^^^^^ source.php
        ?>
//      ^^ meta.embedded.block.php - source.php
        foo *= 2;
//      ^^^^^^^^^ source.js.embedded
//      ^^^ variable.other.readwrite
//          ^^ keyword.operator
//             ^ constant.numeric
        <?
//      ^^ meta.embedded.block.php - source.php
    }
    ?>
</script>
<style>
h1 {
    font-family: Arial;
//  ^^^^^^^^^^^ support.type.property-name
//               ^^^^^ string.unquoted
    <? if ($minimal_increase) { ?>
//  ^^ meta.embedded.line.php - source.php
//    ^^^^^^^^^^^^^^^^^^^^^^^^^^ source.php
//                              ^^ meta.embedded.line.php - source.php
        font-size: 2em;
//      ^^^^^^^^^ support.type.property-name
//                 ^ constant.numeric
    <? } else { ?>
//  ^^ meta.embedded.line.php - source.php
//    ^^^^^^^^^^ source.php
//       ^^^^ keyword.control
//              ^^ meta.embedded.line.php - source.php
        font-size: 3em;
//      ^^^^^^^^^ support.type.property-name
//                 ^ constant.numeric
    <? } ?>
}
</style>

<?php
    for ($i = 0; $i < 10; $i++) { echo $i; }
//  ^^^ keyword.control.loop.for.php
//      ^^^^^^^^^^^^^^^^^^^^^^^ meta.group.php
//      ^ punctuation.section.group.begin.php
//             ^ punctuation.terminator.expression.php
//                      ^ punctuation.terminator.expression.php
//                            ^ punctuation.section.group.end.php
//                              ^ punctuation.section.block.begin.php
//                                         ^ punctuation.section.block.end.php

    FOR ($i = 0; $i < 10; $i++) { ECHO $i; }
//  ^^^ keyword.control.loop.for.php
//      ^^^^^^^^^^^^^^^^^^^^^^^ meta.group.php
//      ^ punctuation.section.group.begin.php
//             ^ punctuation.terminator.expression.php
//                      ^ punctuation.terminator.expression.php
//                            ^ punctuation.section.group.end.php
//                              ^ punctuation.section.block.begin.php
//                                         ^ punctuation.section.block.end.php
 ?>

  <?phpzzzz
//^^ punctuation.section.embedded.begin.php
//  ^^^^^^^ constant.other.php
  ?>
//^^ punctuation.section.embedded.end.php
