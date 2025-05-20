export interface UserData {
    id: number,
    name: string,
    email: string,
    email_verified_at: string | null,
    is_admin: boolean,
    created_at: string,
    updated_at: string
}

export interface IngredientData {
    id: string,
    name: string,
    created_at: string,
    updated_at: string
}
export interface IngredientItem {
    unit?: UnitData,
    amount?: number,
    ingredient?: IngredientData,
    note?: string
}

export interface UnitData {
    id: string,
    name: string,
    abbreviation: string,
    created_at: string,
    updated_at: string
}

export interface Step {
    title: string,
    text: string
}

export interface recipeData {
    title: string,
    description: string,
    ingredients: IngredientItem[],
    steps: Step[]
}