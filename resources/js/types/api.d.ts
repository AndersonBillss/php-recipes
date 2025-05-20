export interface UserData {
    id: number,
    name: string,
    email: string,
    email_verified_at: string | null,
    is_admin: boolean,
    created_at: string,
    updated_at: string
}

export interface IngredientItem {
    id: string,
    name: string,
    created_at: string,
    updated_at: string
}
export interface Ingredient {
    unit?: UnitData,
    amount?: number,
    ingredient?: IngredientItem,
    note: string
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
    ingredients: Ingredient[],
    steps: Step[]
}