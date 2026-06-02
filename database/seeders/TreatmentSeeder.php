<?php

namespace Database\Seeders;

use App\Models\Treatment;
use Illuminate\Database\Seeder;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $treatments = [
            ['name' => 'Analgesics', 'category' => 'Pain Management', 'description' => 'Pain relieving medications'],
            ['name' => 'Antibiotics', 'category' => 'Infection Treatment', 'description' => 'Anti-bacterial medications'],
            ['name' => 'Antifungals', 'category' => 'Infection Treatment', 'description' => 'Anti-fungal medications'],
            ['name' => 'Antivirals', 'category' => 'Infection Treatment', 'description' => 'Anti-viral medications'],
            ['name' => 'Antimalarials', 'category' => 'Infection Treatment', 'description' => 'Malaria treatment medications'],
            ['name' => 'Antiparasitics', 'category' => 'Infection Treatment', 'description' => 'Anti-parasitic medications'],
            ['name' => 'Anthelmintics', 'category' => 'Infection Treatment', 'description' => 'De-worming medications'],
            ['name' => 'Anti-inflammatory Drugs', 'category' => 'Anti-inflammatory', 'description' => 'Inflammation reducing medications'],
            ['name' => 'Antipyretics', 'category' => 'Fever Management', 'description' => 'Fever reducing medications'],
            ['name' => 'Antihistamines', 'category' => 'Allergy Management', 'description' => 'Allergy and histamine blocking medications'],
            ['name' => 'Antacids', 'category' => 'Gastrointestinal', 'description' => 'Stomach acid neutralizing medications'],
            ['name' => 'Proton Pump Inhibitors', 'category' => 'Gastrointestinal', 'description' => 'Acid suppressing medications'],
            ['name' => 'Antiemetics', 'category' => 'Gastrointestinal', 'description' => 'Anti-nausea and vomiting medications'],
            ['name' => 'Antidiarrheals', 'category' => 'Gastrointestinal', 'description' => 'Diarrhea treating medications'],
            ['name' => 'Laxatives', 'category' => 'Gastrointestinal', 'description' => 'Constipation relief medications'],
            ['name' => 'Antidiabetics', 'category' => 'Endocrine', 'description' => 'Oral diabetes medications'],
            ['name' => 'Insulins', 'category' => 'Endocrine', 'description' => 'Insulin therapy medications'],
            ['name' => 'Antihypertensives', 'category' => 'Cardiovascular', 'description' => 'Blood pressure lowering medications'],
            ['name' => 'Beta Blockers', 'category' => 'Cardiovascular', 'description' => 'Beta-adrenergic blocking agents'],
            ['name' => 'ACE Inhibitors', 'category' => 'Cardiovascular', 'description' => 'Angiotensin-converting enzyme inhibitors'],
            ['name' => 'Calcium Channel Blockers', 'category' => 'Cardiovascular', 'description' => 'Vascular smooth muscle relaxants'],
            ['name' => 'Diuretics', 'category' => 'Cardiovascular', 'description' => 'Water and sodium elimination medications'],
            ['name' => 'Statins', 'category' => 'Cardiovascular', 'description' => 'Cholesterol lowering medications'],
            ['name' => 'Anticoagulants', 'category' => 'Cardiovascular', 'description' => 'Blood thinning medications'],
            ['name' => 'Antiplatelets', 'category' => 'Cardiovascular', 'description' => 'Platelet aggregation inhibitors'],
            ['name' => 'Bronchodilators', 'category' => 'Respiratory', 'description' => 'Airway opening medications'],
            ['name' => 'Corticosteroids', 'category' => 'Anti-inflammatory', 'description' => 'Steroid anti-inflammatory medications'],
            ['name' => 'Sedatives', 'category' => 'Central Nervous System', 'description' => 'Calming and relaxation medications'],
            ['name' => 'Hypnotics', 'category' => 'Central Nervous System', 'description' => 'Sleep inducing medications'],
            ['name' => 'Antidepressants', 'category' => 'Psychiatric', 'description' => 'Depression treating medications'],
            ['name' => 'Antipsychotics', 'category' => 'Psychiatric', 'description' => 'Psychosis treating medications'],
            ['name' => 'Antianxiety Drugs', 'category' => 'Psychiatric', 'description' => 'Anxiety relieving medications'],
            ['name' => 'Anticonvulsants', 'category' => 'Neurological', 'description' => 'Seizure prevention medications'],
            ['name' => 'Antiepileptics', 'category' => 'Neurological', 'description' => 'Epilepsy treatment medications'],
            ['name' => 'Muscle Relaxants', 'category' => 'Neurological', 'description' => 'Muscle tension relief medications'],
            ['name' => 'Local Anesthetics', 'category' => 'Anesthesia', 'description' => 'Local numbing medications'],
            ['name' => 'General Anesthetics', 'category' => 'Anesthesia', 'description' => 'Full body anesthesia medications'],
            ['name' => 'Hormonal Drugs', 'category' => 'Endocrine', 'description' => 'Hormone replacement medications'],
            ['name' => 'Contraceptives', 'category' => 'Gynecological', 'description' => 'Birth control medications'],
            ['name' => 'Thyroid Medications', 'category' => 'Endocrine', 'description' => 'Thyroid hormone medications'],
            ['name' => 'Fertility Medications', 'category' => 'Gynecological', 'description' => 'Fertility enhancing medications'],
            ['name' => 'Immunosuppressants', 'category' => 'Immunological', 'description' => 'Immune system suppressing medications'],
            ['name' => 'Vaccines', 'category' => 'Immunological', 'description' => 'Preventive immunization medications'],
            ['name' => 'Vitamins', 'category' => 'Nutritional', 'description' => 'Vitamin supplementation medications'],
            ['name' => 'Mineral Supplements', 'category' => 'Nutritional', 'description' => 'Mineral supplementation medications'],
            ['name' => 'Nutritional Supplements', 'category' => 'Nutritional', 'description' => 'General nutritional supplements'],
            ['name' => 'Dermatological Medicines', 'category' => 'Dermatology', 'description' => 'Skin condition treatment medications'],
            ['name' => 'Ophthalmic Medicines', 'category' => 'Ophthalmology', 'description' => 'Eye condition treatment medications'],
            ['name' => 'Otic Medicines', 'category' => 'ENT', 'description' => 'Ear condition treatment medications'],
            ['name' => 'Nasal Preparations', 'category' => 'ENT', 'description' => 'Nasal condition treatment medications'],
            ['name' => 'Respiratory Medicines', 'category' => 'Respiratory', 'description' => 'Respiratory system medications'],
            ['name' => 'Cardiovascular Medicines', 'category' => 'Cardiovascular', 'description' => 'Heart and circulation medications'],
            ['name' => 'Gastrointestinal Medicines', 'category' => 'Gastrointestinal', 'description' => 'Digestive system medications'],
            ['name' => 'Neurological Medicines', 'category' => 'Neurological', 'description' => 'Nervous system medications'],
            ['name' => 'Psychiatric Medicines', 'category' => 'Psychiatric', 'description' => 'Mental health medications'],
            ['name' => 'Urological Medicines', 'category' => 'Urological', 'description' => 'Urinary system medications'],
            ['name' => 'Gynecological Medicines', 'category' => 'Gynecological', 'description' => 'Female reproductive system medications'],
            ['name' => 'Obstetric Medicines', 'category' => 'Gynecological', 'description' => 'Pregnancy and childbirth medications'],
            ['name' => 'Oncology Medicines', 'category' => 'Oncology', 'description' => 'Cancer treatment medications'],
            ['name' => 'Rheumatology Medicines', 'category' => 'Rheumatology', 'description' => 'Rheumatoid and joint disease medications'],
            ['name' => 'Emergency Medicines', 'category' => 'Emergency', 'description' => 'Emergency and acute care medications'],
            ['name' => 'Intensive Care Medicines', 'category' => 'Critical Care', 'description' => 'ICU and critical care medications'],
            ['name' => 'Pediatric Medicines', 'category' => 'Pediatrics', 'description' => 'Children-specific medications'],
            ['name' => 'Geriatric Medicines', 'category' => 'Geriatrics', 'description' => 'Elderly-specific medications'],
            ['name' => 'Antiseptics', 'category' => 'Disinfection', 'description' => 'Germ killing surface agents'],
            ['name' => 'Disinfectants', 'category' => 'Disinfection', 'description' => 'Environmental cleaning agents'],
            ['name' => 'Wound Care Products', 'category' => 'Topical', 'description' => 'Wound healing and management products'],
            ['name' => 'Intravenous Fluids', 'category' => 'IV Therapy', 'description' => 'Intravenous fluid replacements'],
            ['name' => 'Blood Products', 'category' => 'Transfusion', 'description' => 'Blood and blood component products'],
            ['name' => 'Diagnostic Agents', 'category' => 'Diagnostic', 'description' => 'Medical diagnostic agents'],
            ['name' => 'Chemotherapy Drugs', 'category' => 'Oncology', 'description' => 'Cancer chemotherapy medications'],
            ['name' => 'Biologics', 'category' => 'Biopharmaceuticals', 'description' => 'Biological medications'],
            ['name' => 'Monoclonal Antibodies', 'category' => 'Biopharmaceuticals', 'description' => 'Targeted biological therapies'],
            ['name' => 'Pain Management Medicines', 'category' => 'Pain Management', 'description' => 'Comprehensive pain relief medications'],
            ['name' => 'Sleep Disorder Medicines', 'category' => 'Central Nervous System', 'description' => 'Sleep disorder treatment medications'],
            ['name' => 'Smoking Cessation Medicines', 'category' => 'Behavioral Health', 'description' => 'Quit smoking support medications'],
            ['name' => 'Allergy Medicines', 'category' => 'Allergy Management', 'description' => 'Allergic reaction treatment medications'],
            ['name' => 'Cold and Flu Medicines', 'category' => 'Respiratory', 'description' => 'Common cold and flu medications'],
            ['name' => 'Dental Medicines', 'category' => 'Dental', 'description' => 'Oral and dental medications'],
            ['name' => 'ENT Medicines', 'category' => 'ENT', 'description' => 'Ear, nose and throat medications'],
            ['name' => 'Antiulcer Drugs', 'category' => 'Gastrointestinal', 'description' => 'Ulcer treatment medications'],
            ['name' => 'Anti-gout Medicines', 'category' => 'Rheumatology', 'description' => 'Gout treatment medications'],
            ['name' => 'Anti-obesity Medicines', 'category' => 'Metabolic', 'description' => 'Weight loss medications'],
            ['name' => 'Erectile Dysfunction Medicines', 'category' => 'Urological', 'description' => 'ED treatment medications'],
            ['name' => 'Osteoporosis Medicines', 'category' => 'Endocrine', 'description' => 'Bone density medications'],
            ['name' => 'Ophthalmology Drugs', 'category' => 'Ophthalmology', 'description' => 'Eye disease treatment medications'],
            ['name' => 'Hepatology Medicines', 'category' => 'Hepatology', 'description' => 'Liver disease medications'],
            ['name' => 'Nephrology Medicines', 'category' => 'Nephrology', 'description' => 'Kidney disease medications'],
            ['name' => 'Endocrine Medicines', 'category' => 'Endocrine', 'description' => 'Endocrine system medications'],
        ];

        foreach ($treatments as $treatment) {
            Treatment::updateOrCreate(
                ['name' => $treatment['name']],
                $treatment
            );
        }
    }
}
