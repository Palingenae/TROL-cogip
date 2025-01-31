<?php
    namespace App\Controller\CircularReferenceHandlers;

    use App\Entity\Company;
    use App\Entity\Invoice;
    use App\Entity\Type;
    use Symfony\Component\Serializer\Exception\CircularReferenceException;
    use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

    class InvoiceCircularReferenceHandler implements CircularReferenceHandler {
        public static function getContext(): array {
            return [
                AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function (object $object, ?string $format, array $context): string {
                    if (!$object instanceof Type && !$object instanceof Company && !$object instanceof Invoice) {
                        throw new CircularReferenceException('A circular reference has been detected when serializing the object of class "'.get_debug_type($object).'".');
                    }
            
                    return $object->getId();
                },
            ];
        }
    }
?>
