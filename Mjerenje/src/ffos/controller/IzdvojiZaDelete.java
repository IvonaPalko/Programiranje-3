/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ffos.controller;

import com.google.gson.ExclusionStrategy;
import com.google.gson.FieldAttributes;
import ffos.model.Operater;

/**
 *
 * @author tjakopec
 */
public class IzdvojiZaDelete implements ExclusionStrategy {

    @Override
    public boolean shouldSkipClass(Class<?> arg0) {
        return false;
    }

    @Override
    public boolean shouldSkipField(FieldAttributes f) {
        return (f.getDeclaringClass() == Operater.class
                && (f.getName().equals("lokacija")
                || f.getName().equals("datum_mjerenja")
                || f.getName().equals("temperatura")
                || f.getName().equals("osoba")));
    }

}
