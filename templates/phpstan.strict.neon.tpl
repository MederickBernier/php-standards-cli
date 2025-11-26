# Strict configuration for PHPStan

parameters:
    # You can switch to "max" later if you prefer.
    level: 11

    paths:
        - src
        - app
        - tests

    tmpDir: var/cache/phpstan

    inferPrivatePropertyTypeFromConstructor: true
    treatPhpDocTypesAsCertain: true

    checkMissingIterableValueType: true
    checkGenericClassInNonGenericObjectType: true
    checkMissingCallableSignature: true
    checkAlwaysTrueCheckTypeFunctionCall: true
    checkAlwaysTrueInstanceof: true
    checkAlwaysTrueComparison: true
    checkAlwaysTrueStrictComparison: true
    checkAlwaysTrueLateResolvableTypes: true

    checkExplicitMixed: true
    checkImplicitMixed: true
    checkFunctionArgumentTypes: true
    checkReturnTypeHints: true
    checkMissingVarTagTypehints: true
    checkUninitializedProperties: true

    reportUnmatchedIgnoredErrors: true

    ignoreErrors:
        # Ideally empty for strict mode.
